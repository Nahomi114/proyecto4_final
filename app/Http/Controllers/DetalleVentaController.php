<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\User;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente', 'usuario')->paginate(10);
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
            'productos' => 'required|array',
            'productos.*' => 'exists:productos,ID_producto',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
            'descuentos' => 'required|array',
            'descuentos.*' => 'numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $venta = Venta::create([
                'ID_clientes' => $request->ID_clientes,
                'user_id' => $request->user_id,
                'fecha_venta' => $request->fecha_venta,
                'impuesto_venta' => 0.18,
                'total' => 0,
                'Estado' => 'Pendiente',
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

            $venta->update(['total' => $total * (1 + $venta->impuesto_venta)]);
        });

        return redirect()->route('ventas.index')->with('success', 'Venta creada correctamente.');
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
            'productos' => 'required|array',
            'productos.*' => 'exists:productos,ID_producto',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
            'descuentos' => 'required|array',
            'descuentos.*' => 'numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $venta) {
            $venta->update([
                'ID_clientes' => $request->ID_clientes,
                'user_id' => $request->user_id,
                'fecha_venta' => $request->fecha_venta,
                'impuesto_venta' => 0.18,
                'total' => 0,
                'Estado' => 'Pendiente',
            ]);

            $total = 0;

            // Eliminar los detalles de venta anteriores
            $venta->detallesVenta()->delete();

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

            $venta->update(['total' => $total * (1 + $venta->impuesto_venta)]);
        });

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
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
