<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class IngresoController extends Controller
{
    public function index() {
        $ingresos = Ingreso::with('proveedor', 'user')->paginate(20);
        return view('ingresos.index', compact('ingresos'));
    }

    public function create() {
        return view('ingresos.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'ID_proveedores' => 'required|exists:proveedores,ID_proveedores',
            'user_id' => 'required|exists:users,id',
            'tipo_comprob' => 'required|string|max:255',
            'serie_comprob' => 'required|string|max:255',
            'num_comprob' => 'required|string|max:255',
            'fec_ingreso' => 'required|date',
            'impuesto' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Ingreso::create($request->all());
        return redirect()->route('ingresos.index');
    }

    public function edit(Ingreso $ingreso) {
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(Request $request, Ingreso $ingreso) { 
        $request->validate([
            'ID_proveedores' => 'required|exists:proveedores,ID_proveedores',
            'user_id' => 'required|exists:users,id',
            'tipo_comprob' => 'required|string|max:255',
            'serie_comprob' => 'required|string|max:255',
            'num_comprob' => 'required|string|max:255',
            'fec_ingreso' => 'required|date',
            'impuesto' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $ingreso->update($request->all());
        return redirect()->route('ingresos.index');
    }

    public function destroy(Ingreso $ingreso) { 
        try {
            // Si hay lógica específica antes de eliminar el ingreso, colócala aquí.
            $ingreso->delete();
            return redirect()->route('ingresos.index')->with('success', 'Ingreso eliminado correctamente.');
        } catch (BadMethodCallException $e) {
            return redirect()->route('ingresos.index')->with('error', 'No se puede eliminar el ingreso en este momento.');
        } catch (QueryException $e) {
            // Si ocurre una excepción por restricción de clave externa (foreign key constraint)
            if (DB::getDriverName() == 'mysql' && $e->errorInfo[1] == 1451) {
                return redirect()->route('ingresos.index')->with('error', 'No se puede eliminar el ingreso porque está relacionado con otros registros.');
            }

            // Si ocurre otro tipo de excepción, podrías manejarla de acuerdo a tus necesidades
            return redirect()->route('ingresos.index')->with('error', 'Ocurrió un error al intentar eliminar el ingreso.');
        }
    }
}