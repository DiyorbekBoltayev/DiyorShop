<?php

namespace App\Services\CRUD;

use App\Models\Category;

class CategoryService
{
    public static function store($name, $parent_id = null)
    {
        $category = new Category();
        $category->name = $name;
        $category->parent_id = $parent_id;
        $category->save();
        return $category;
    }
}
