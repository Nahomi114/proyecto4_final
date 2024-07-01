<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\User;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use BadMethodCallException;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente', 'usuario')->paginate(20);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $users = User::all();

        return view('ventas.create', compact('clientes', 'productos', 'users'));
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        $productos = Producto::all(); // O puedes ajustar según tus necesidades

        return view('ventas.show', compact('venta', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_clientes' => 'required|exists:clientes,ID_clientes',
            'user_id' => 'required|exists:users,id',
            'fecha_venta' => 'required|date',
            'productos' => 'required|array',
            'productos.*' => 'exists:productos,ID_producto',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
            'descuentos' => 'required|array',
            'descuentos.*' => 'numeric|min:0',
            'total' => 'required|numeric',
            'Estado' => 'required',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $venta = Venta::create([
                    'ID_clientes' => $request->ID_clientes,
                    'user_id' => $request->user_id,
                    'fecha_venta' => $request->fecha_venta,
                    'total' => $request->total,
                    'Estado' => $request->Estado,
                ]);

                $total = 0;

                foreach ($request->productos as $index => $ID_producto) {
                    $producto = Producto::find($ID_producto);
                    $cantidad = $request->cantidades[$index];
                    $descuento = $request->descuentos[$index];
                    $precio = $producto->Precio_producto;
                    $subtotal = ($cantidad * $precio) - $descuento;

                    DetalleVenta::create([
                        'ID_producto' => $ID_producto,
                        'ID_ventas' => $venta->ID_ventas,
                        'cantidad' => $cantidad,
                        'precio' => $precio,
                        'descuento' => $descuento,
                        'subtotal' => $subtotal,
                    ]);

                    $total += $subtotal;
                }

                $venta->update(['total' => $total]);
            });

            return redirect()->route('ventas.index')->with('success', 'Venta creada correctamente.');
        } catch (\Exception $e) {
            \Log::error('Error al intentar guardar la venta: ' . $e->getMessage());
            return redirect()->route('ventas.create')->with('error', 'Ocurrió un error al intentar guardar la venta. Por favor, contacta al soporte técnico.');
        }
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $users = User::all();

        return view('ventas.edit', compact('venta', 'clientes', 'productos', 'users'));
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
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        try {
            if ($venta->detallesVenta()->exists()) {
                return redirect()->route('ventas.index')->with('error', 'No se puede eliminar la venta porque tiene detalles de venta asociados.');
            }

            $venta->delete();

            return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('ventas.index')->with('error', 'Ocurrió un error al intentar eliminar la venta.');
        }
    }
}
