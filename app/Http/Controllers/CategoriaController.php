<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create() {
        return view('categorias.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'Nom_categorias' => 'required|string|max:50',
            'Desc_categorias' => 'required|string|max:100',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function edit(Categoria $categoria) {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) { 
        $request->validate([
            'Nom_categorias' => 'required|string|max:50',
            'Desc_categorias' => 'required|string|max:100',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria) { 
        try {
            // Verificar si la categoría tiene productos asociados
            if ($categoria->productos()->exists()) {
                return redirect()->route('categorias.index')->with('error', 'No se puede eliminar la categoría porque está relacionada con productos.');
            }
    
            // Si no tiene productos asociados, proceder a eliminar la categoría
            $categoria->delete();
    
            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    
        } catch (BadMethodCallException $e) {
            // Manejar la excepción BadMethodCallException
            return redirect()->route('categorias.index')->with('error', 'No se puede eliminar la categoría en este momento.');
    
        } catch (QueryException $e) {
            // Si ocurre una excepción por restricción de clave externa (foreign key constraint)
            if (DB::getDriverName() == 'mysql' && $e->errorInfo[1] == 1451) {
                return redirect()->route('categorias.index')->with('error', 'No se puede eliminar la categoría porque está relacionada en cascada con productos.');
            }
    
            // Si ocurre otro tipo de excepción, podrías manejarla de acuerdo a tus necesidades
            return redirect()->route('categorias.index')->with('error', 'Ocurrió un error al intentar eliminar la categoría.');
        }
    }
    
}
