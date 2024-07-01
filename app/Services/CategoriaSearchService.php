<?php

namespace App\Services;

use App\Structures\BinarySearchTree;
use App\Models\Categoria;

class CategoriaSearchService
{
    protected $tree;

    public function __construct()
    {
        $this->tree = new BinarySearchTree();
        
        $categorias = Categoria::all();
        foreach ($categorias as $categoria) {
            $this->tree->insert($categoria->Nom_categorias, $categoria);
        }
    }

    public function search($searchKey)
    {
        $resultNode = $this->tree->search($searchKey);

        if ($resultNode) {
            return $resultNode->data;
        } else {
            return null;
        }
    }
}
