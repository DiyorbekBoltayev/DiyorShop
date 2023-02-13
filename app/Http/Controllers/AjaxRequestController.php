<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function categoryTable()
    {

        $query=Category::with('parent')->select('categories.*');
        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->editColumn('parent_id',function ($category){
                return $category->parent->name;
            })
            ->addColumn('action',function ($category){
                return '<a href="'.route('admin.categories.edit',$category->id).'" class="btn btn-info btn-sm"><i class="bx bx-pencil"></i></a>
             <form action="'.route('admin.categories.destroy',$category->id).'" method="post" class="d-inline">
             '.csrf_field().'
             '.method_field('DELETE').'
             <button type="button"  class="btn btn-danger show_confirm btn-sm"><i class="bx bx-trash"></i></button>
             </form>';
            })
            ->rawColumns(['action'])
            ->make(true);

    }

}
