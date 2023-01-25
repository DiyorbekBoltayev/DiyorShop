<?php

namespace App\Services;

class ProductService
{

    public static function create($data)
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->save();
        return $product;
    }
}
