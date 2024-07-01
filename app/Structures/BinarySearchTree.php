<?php

namespace App\Structures;

class BinarySearchTree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert($key, $data)
    {
        $this->root = $this->insertRec($this->root, $key, $data);
    }

    private function insertRec($node, $key, $data)
    {
        if ($node === null) {
            return new TreeNode($key, $data);
        }

        if ($key < $node->key) {
            $node->left = $this->insertRec($node->left, $key, $data);
        } else if ($key > $node->key) {
            $node->right = $this->insertRec($node->right, $key, $data);
        }

        return $node;
    }

    public function search($key)
    {
        return $this->searchRec($this->root, $key);
    }

    private function searchRec($node, $key)
    {
        if ($node === null || $node->key == $key) {
            return $node;
        }

        if ($key < $node->key) {
            return $this->searchRec($node->left, $key);
        }

        return $this->searchRec($node->right, $key);
    }
}
