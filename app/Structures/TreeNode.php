<?php

namespace App\Structures;

class TreeNode
{
    public $key;
    public $data;
    public $left;
    public $right;

    public function __construct($key, $data)
    {
        $this->key = $key;
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}
