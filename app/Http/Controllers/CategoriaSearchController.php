<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoriaSearchService;

class CategoriaSearchController extends Controller
{
    protected $categoriaSearchService;

    public function __construct(CategoriaSearchService $categoriaSearchService)
    {
        $this->categoriaSearchService = $categoriaSearchService;
    }

    public function search(Request $request)
    {
        $searchKey = $request->input('search_key');
        $result = $this->categoriaSearchService->search($searchKey);

        if ($result) {
            return redirect()->back()->with('result', $result);
        } else {
            return redirect()->back()->with('error', 'No se encontraron resultados.');
        }
    }
}
