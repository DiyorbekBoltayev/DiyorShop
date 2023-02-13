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

    public static function update($id, $name, $parent_id= null)
    {
        $category = Category::find($id);
        $category->name = $name;
        $category->parent_id = $parent_id;
        $category->save();
        return $category;
    }
    public static function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }
}
