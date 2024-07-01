<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProveedorSearchService;
use App\Models\Proveedor;

class ProveedorSearchController extends Controller
{
    protected $proveedorSearchService;

    public function __construct(ProveedorSearchService $proveedorSearchService)
    {
        $this->proveedorSearchService = $proveedorSearchService;
    }

    public function search(Request $request)
    {
        $searchKey = $request->input('search_key');
        $result = $this->proveedorSearchService->search($searchKey);

        if ($result) {
            return redirect()->back()->with('result', $result);
        } else {
            return redirect()->back()->with('error', 'No se encontraron resultados.');
        }
    }

    public function index()
    {
        $proveedores = Proveedor::paginate(10); // Modifica según tus necesidades de paginación
        return view('proveedores.index', compact('proveedores'));
    }
}
