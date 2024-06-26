<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;
use Carbon\Carbon;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente', 'usuario')->paginate(10);

        foreach ($ventas as $venta) {
            $venta->fecha_venta = Carbon::parse($venta->fecha_venta);
        }

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_clientes' => 'required|exists:clientes,ID_clientes',
            'user_id' => 'required|exists:users,id',
            'tipo_comprobante' => 'required',
            'serie_comprobante' => 'required',
            'num_comprobante' => 'required',
            'fecha_venta' => 'required|date',
            'impuesto_venta' => 'required|numeric',
            'total' => 'required|numeric',
            'Estado' => 'required',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas.index');
    }

    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'ID_clientes' => 'required|exists:clientes,ID_clientes',
            'user_id' => 'required|exists:users,id',
            'tipo_comprobante' => 'required',
            'serie_comprobante' => 'required',
            'num_comprobante' => 'required',
            'fecha_venta' => 'required|date',
            'impuesto_venta' => 'required|numeric',
            'total' => 'required|numeric',
            'Estado' => 'required',
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta)
    {
        try {
            // Verificar si la venta tiene detalles de venta asociados
            if ($venta->detallesVenta()->exists()) {
                return redirect()->route('ventas.index')->with('error', 'No se puede eliminar la venta porque tiene detalles de venta asociados.');
            }

            // Si no tiene detalles de venta asociados, proceder a eliminar la venta
            $venta->delete();

            return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');

        } catch (BadMethodCallException $e) {
            return redirect()->route('ventas.index')->with('error', 'No se puede eliminar la venta en este momento.');

        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('ventas.index')->with('error', 'Ocurrió un error al intentar eliminar la venta.');
        }
    }

}