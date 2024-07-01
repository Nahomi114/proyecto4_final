<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\User;
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
        $clientes = Cliente::all();
        $productos = Producto::all();
        $users = User::all();

        return view('ventas.create', compact('clientes', 'productos', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_clientes' => 'required|exists:clientes,ID_clientes',
            'user_id' => 'required|exists:users,id',
            'fecha_venta' => 'required|date',
            
            'total' => 'required|numeric',
            'Estado' => 'required',
        ]);

        // Calcular el total y otros campos antes de crear la venta
        $total = $request->total;
        // Realizar cualquier cálculo necesario aquí

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
            'fecha_venta' => 'required|date',
            
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
