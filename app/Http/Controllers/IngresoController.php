<?php

namespace App\Http\Controllers;
use App\Models\Proveedor; 
use App\Models\User;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

use BadMethodCallException;

class IngresoController extends Controller
{
    public function index() {
        $ingresos = Ingreso::with('proveedor', 'user')->paginate(20);
        return view('ingresos.index', compact('ingresos'));
    }
    public function pdf(){
        $ingresos=Ingreso::all();
        $pdf = Pdf::loadView('ingresos.pdf', compact('ingresos'));
        return $pdf->download('Reporte de Ingresos.pdf');
    }
    public function create()    
    {
    $proveedores = Proveedor::all();
    $productos = Producto::all();
    $users = User::all(); // Asegúrate de importar el modelo User

    return view('ingresos.create', compact('proveedores', 'productos', 'users'));
    }

    public function show($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $productos = Producto::all(); // O puedes ajustar según tus necesidades

        return view('ingresos.show', compact('ingreso', 'productos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ID_proveedores' => 'required',
            'user_id' => 'required',
            'serie_comprob' => 'required',
            'fec_ingreso' => 'required|date',
            'detalles' => 'required|array',
            'detalles.*.ID_producto' => 'required|exists:productos,ID_producto',
            'detalles.*.cant_det_ingreso' => 'required|numeric|min:1',
            'detalles.*.precio_det_ingreso' => 'required|numeric|min:0',
        ]);
    
        $ingreso = Ingreso::create($request->only([
            'ID_proveedores',
            'user_id',
            'serie_comprob',
            'fec_ingreso',
            'impuesto',
            'total',
        ]));
    
        foreach ($request->detalles as $detalle) {
            $ingreso->detalles()->create($detalle);
        }
    
        return redirect()->route('ingresos.index')->with('success', 'Ingreso creado con éxito.');
    }
    

    
    public function edit(Ingreso $ingreso) {
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(Request $request, Ingreso $ingreso) { 
        $request->validate([
            'ID_proveedores' => 'required|exists:proveedores,ID_proveedores',
            'user_id' => 'required|exists:users,id',

            'serie_comprob' => 'required|string|max:255',

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