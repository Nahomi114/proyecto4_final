<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductoSearchService;

class ProductoSearchController extends Controller
{
    protected $productoSearchService;

    public function __construct(ProductoSearchService $productoSearchService)
    {
        $this->productoSearchService = $productoSearchService;
    }

    public function search(Request $request)
    {
        $searchKey = $request->input('search_key');
        $result = $this->productoSearchService->search($searchKey);

        if ($result) {
            return redirect()->back()->with('result', $result);
        } else {
            return redirect()->back()->with('error', 'No se encontraron resultados.');
        }
    }
}
