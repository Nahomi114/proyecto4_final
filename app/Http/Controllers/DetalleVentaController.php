<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detallesVenta = DetalleVenta::paginate(10);
        return view('detalle_ventas.index', compact('detallesVenta'));
    }

    public function create()
    {
        return view('detalle_ventas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_productos' => 'required|exists:productos,ID_producto',
            'ID_ventas' => 'required|exists:ventas,ID_ventas',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descuento' => 'required|numeric',
        ]);

        DetalleVenta::create($request->all());
        return redirect()->route('detalle_ventas.index');
    }

    public function edit(DetalleVenta $detalleVenta)
    {
        return view('detalle_ventas.edit', compact('detalleVenta'));
    }

    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $request->validate([
            'ID_productos' => 'required|exists:productos,ID_producto',
            'ID_ventas' => 'required|exists:ventas,ID_ventas',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descuento' => 'required|numeric',
        ]);

        $detalleVenta->update($request->all());
        return redirect()->route('detalle_ventas.index');
    }

    public function destroy(DetalleVenta $detalleVenta)
    {
        try {
            // Obtener el producto asociado al detalle de venta
            $producto = $detalleVenta->producto;
    
            // Verificar si el producto tiene detalles de ingreso asociados
            if ($producto->detallesIngreso()->exists()) {
                return redirect()->route('detalle_ventas.index')->with('error', 'No se puede eliminar el detalle de venta porque el producto tiene detalles de ingreso asociados.');
            }
    
            // Si no tiene detalles de ingreso asociados, proceder a eliminar el detalle de venta
            $detalleVenta->delete();
    
            return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta eliminado correctamente.');
    
        } catch (BadMethodCallException $e) {
            return redirect()->route('detalle_ventas.index')->with('error', 'No se puede eliminar el detalle de venta en este momento.');
    
        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('detalle_ventas.index')->with('error', 'Ocurrió un error al intentar eliminar el detalle de venta.');
        }
    }
     
}

