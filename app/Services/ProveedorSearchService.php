<?php

namespace App\Services;

use App\Models\Proveedor;
use App\Structures\BinarySearchTree;

class ProveedorSearchService
{
    protected $tree;

    public function __construct()
    {
        $this->tree = new BinarySearchTree();

       
        $proveedores = Proveedor::all();
        foreach ($proveedores as $proveedor) {
            $this->tree->insert($proveedor->Nom_proveedores, $proveedor);
        }
    }

    public function search($searchKey)
    {
        $resultNode = $this->tree->search($searchKey);

        return $resultNode ? $resultNode->data : null;
    }
}
