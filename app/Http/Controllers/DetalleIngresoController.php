<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use App\Models\Proveedor;
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
        // Cargar los detalles de ingreso con relaciones paginadas
        $detalleIngresos = DetalleIngreso::with(['ingreso', 'producto'])->paginate(10);

        return view('detalle_ingreso.index', compact('detalleIngresos'));
    }

    public function create()
    {
        // Cargar proveedores, usuarios y productos para el formulario de creación
        $proveedores = Proveedor::all(['ID_proveedores', 'Nom_proveedores']);
        $users = User::all(['id', 'name']);
        $productos = Producto::all(['ID_producto', 'Nom_producto']);

        return view('detalle_ingreso.create', compact('proveedores', 'users', 'productos'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario de creación
        $request->validate([
            'ID_producto' => 'required|exists:productos,ID_producto',
            'ID_ingreso' => 'required|exists:ingresos,ID_ingreso',
            'cant_det_ingreso' => 'required|integer',
            'precio_det_ingreso' => 'required|numeric',
        ]);

        // Crear un nuevo detalle de ingreso
        DetalleIngreso::create($request->all());

        return redirect()->route('detalle_ingreso.index')->with('success', 'Detalle de ingreso creado correctamente.');
    }

    public function edit($id)
{
    $ingreso = Ingreso::findOrFail($id);
    $proveedores = Proveedor::all();
    $users = User::all();
    $productos = Producto::all();

    return view('detalle_ingreso.edit', compact('ingreso', 'proveedores', 'users', 'productos'));
}


    public function update(Request $request, DetalleIngreso $detalleIngreso)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            'ID_producto' => 'required|exists:productos,ID_producto',
            'ID_ingreso' => 'required|exists:ingresos,ID_ingreso',
            'cant_det_ingreso' => 'required|integer',
            'precio_det_ingreso' => 'required|numeric',
        ]);

        // Actualizar el detalle de ingreso con los datos recibidos
        $detalleIngreso->update($request->all());

        return redirect()->route('detalle_ingreso.index')->with('success', 'Detalle de ingreso actualizado correctamente.');
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
