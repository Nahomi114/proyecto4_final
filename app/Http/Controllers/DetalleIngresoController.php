<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class DetalleIngresoController extends Controller
{
    public function index()
    {
        $detallesIngreso = DetalleIngreso::paginate(10);
        return view('detalle_ingreso.index', compact('detallesIngreso'));
    }

    public function create()
    {
        return view('detalle_ingreso.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_producto' => 'required|exists:productos,ID_producto',
            'ID_ingreso' => 'required|exists:ingresos,ID_ingreso',
            'cant_det_ingreso' => 'required|integer',
            'precio_det_ingreso' => 'required|numeric',
        ]);

        DetalleIngreso::create($request->all());
        return redirect()->route('detalle_ingreso.index');
    }

    public function edit(DetalleIngreso $detalleIngreso)
    {
        return view('detalle_ingreso.edit', compact('detalleIngreso'));
    }

    public function update(Request $request, DetalleIngreso $detalleIngreso)
    {
        $request->validate([
            'ID_producto' => 'required|exists:productos,ID_producto',
            'ID_ingreso' => 'required|exists:ingresos,ID_ingreso',
            'cant_det_ingreso' => 'required|integer',
            'precio_det_ingreso' => 'required|numeric',
        ]);

        $detalleIngreso->update($request->all());
        return redirect()->route('detalle_ingreso.index');
    }

    public function destroy(DetalleIngreso $detalleIngreso)
    {
        try {
            // Eliminar el detalle de ingreso
            $detalleIngreso->delete();

            return redirect()->route('detalle_ingreso.index')->with('success', 'Detalle de ingreso eliminado correctamente.');

        } catch (BadMethodCallException $e) {
            return redirect()->route('detalle_ingreso.index')->with('error', 'No se puede eliminar el detalle de ingreso en este momento.');

        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('detalle_ingreso.index')->with('error', 'Ocurrió un error al intentar eliminar el detalle de ingreso.');
        }
    }

}
