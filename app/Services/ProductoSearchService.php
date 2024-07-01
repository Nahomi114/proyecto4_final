<?php

namespace App\Services;

use App\Models\Producto;
use App\Structures\BinarySearchTree;
use App\Structures\TreeNode;

class ProductoSearchService
{
    protected $tree;

    public function __construct()
    {
        $this->tree = new BinarySearchTree();
        // Insertar datos de productos en el árbol al inicializar el servicio
        $productos = Producto::all();
        foreach ($productos as $producto) {
            $this->tree->insert($producto->Nom_producto, $producto);
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
