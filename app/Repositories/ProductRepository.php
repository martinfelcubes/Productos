<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository

{
    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
    {
        
       return  $this->model->all();
   
    }

    public function findby(int $id)
    {
        
       return  $this->model->find($id);
   
    }

    public function save(product $producto)
    {
        $producto->save();
       return  $producto;
   
    }

    public function delete(product $producto)
    {
        $producto->delete();
       return  $producto;
   
    }


}