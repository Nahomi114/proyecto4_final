<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class ProveedorController extends Controller
{
    public function index() {
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create() {
        return view('proveedores.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'Nom_proveedores' => 'required|string|max:255',
            'RUC_proveedores' => 'required|string|max:10|unique:proveedores,RUC_proveedores',
            'Telf_proveedores' => 'required|string|max:20',
            'Correo_proveedores' => 'required|string|email|max:255|unique:proveedores,Correo_proveedores'
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedores.index');
    }

    public function edit(Proveedor $proveedor) {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor) { 
        $request->validate([
            'Nom_proveedores' => 'required|string|max:255',
            'RUC_proveedores' => 'required|string|max:10|unique:proveedores,RUC_proveedores,'.$proveedor->ID_proveedores.',ID_proveedores',
            'Telf_proveedores' => 'required|string|max:20',
            'Correo_proveedores' => 'required|string|email|max:255|unique:proveedores,Correo_proveedores,'.$proveedor->ID_proveedores.',ID_proveedores'
        ]);

        $proveedor->update($request->all());
        return redirect()->route('proveedores.index');
    }

    public function destroy(Proveedor $proveedor) { 
        try {
            // Verificar si el proveedor tiene ingresos asociados
            if ($proveedor->ingresos()->exists()) {
                return redirect()->route('proveedores.index')->with('error', 'No se puede eliminar el proveedor porque está relacionado con ingresos.');
            }

            // Si no tiene ingresos asociados, proceder a eliminar el proveedor
            $proveedor->delete();

            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');

        } catch (\Exception $e) {
            // Manejar otras excepciones
            return redirect()->route('proveedores.index')->with('error', 'Ocurrió un error al intentar eliminar el proveedor.');
        }
    }
}