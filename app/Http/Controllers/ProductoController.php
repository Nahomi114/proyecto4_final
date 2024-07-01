<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::paginate(6);
        return view('productos.index', compact('productos'));
    }
    public function pdf(){
        $productos=Producto::all();
        $pdf = Pdf::loadView('productos.pdf', compact('productos'));
        return $pdf->download('Reporte de Productos.pdf');
    }
    public function create() {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }
    public function show($id)
{
    $proveedor = Proveedor::findOrFail($id); 
    return view('proveedores.show', compact('proveedor'));
}

    
    public function store(Request $request) {
        $request->validate([
            'ID_categorias' => 'required|exists:categorias,ID_categorias',
            'Cod_Barra_producto' => 'required|string|max:255',
            'Nom_producto' => 'required|string|max:255',
            'Precio_producto' => 'required|numeric',
            'Cantida_producto' => 'required|integer',
            'Img_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            'Stock_producto' => 'required|integer',
            'Desc_producto' => 'required|string|max:255',
            'Estado_producto' => 'required|string|max:50'
        ]);

        // Procesamiento de la imagen si se proporciona
        if ($request->hasFile('Img_producto')) {
            $image = $request->file('Img_producto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/productos'), $imageName); // Guardar la imagen en la carpeta public/images/productos

            $imgPath = 'images/productos/' . $imageName; // Ruta de la imagen para guardar en la base de datos
        } else {
            $imgPath = null;
        }

        // Crear el producto en la base de datos
        Producto::create(array_merge($request->all(), ['Img_producto' => $imgPath]));

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto) {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto) {
        $request->validate([
            'ID_categorias' => 'required|exists:categorias,ID_categorias',
            'Cod_Barra_producto' => 'required|string|max:255',
            'Nom_producto' => 'required|string|max:255',
            'Precio_producto' => 'required|numeric',
            'Cantida_producto' => 'required|integer',
            'Img_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            'Stock_producto' => 'required|integer',
            'Desc_producto' => 'required|string|max:255',
            'Estado_producto' => 'required|string|max:50'
        ]);

        // Procesamiento de la imagen si se proporciona
        if ($request->hasFile('Img_producto')) {
            $image = $request->file('Img_producto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/productos'), $imageName); // Guardar la imagen en la carpeta public/images/productos

            $imgPath = 'images/productos/' . $imageName; // Ruta de la imagen para guardar en la base de datos
        } else {
            $imgPath = $producto->Img_producto; // Mantener la imagen actual si no se proporciona una nueva
        }

        // Actualizar el producto en la base de datos
        $producto->update(array_merge($request->all(), ['Img_producto' => $imgPath]));

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        try {
            // Verificar si el producto tiene detalles de ingreso asociados
            if ($producto->detallesIngreso()->exists()) {
                return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto porque tiene detalles de ingreso asociados.');
            }

            // Si no tiene detalles de ingreso asociados, proceder a eliminar el producto
            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');

        } catch (BadMethodCallException $e) {
            return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto en este momento.');

        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('productos.index')->with('error', 'Ocurrió un error al intentar eliminar el producto.');
        }
    }
}