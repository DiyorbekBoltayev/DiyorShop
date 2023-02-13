<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CRUD\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {

        return view('admin.categories.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories=Category::all();

        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        try {
            CategoryService::store($request->name, $request->parent_id);
            return redirect()->route('admin.categories.index')->with('success','Kategoriya yaratildi.');
        }catch (\Exception $exception){
            return redirect()->route('admin.categories.index')->with('error',$exception->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $categories=Category::all();

        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        try {
            CategoryService::update($id, $request->name, $request->parent_id);
            return redirect()->route('admin.categories.index')->with('success','Kategoriya tahrirlandi.');
        }catch (\Exception $exception){
            return redirect()->route('admin.categories.index')->with('error',$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            CategoryService::delete($id);
            return redirect()->route('admin.categories.index')->with('success','Kategoriya o`chirildi.');
        }catch (\Exception $exception){
            return redirect()->route('admin.categories.index')->with('error',$exception->getMessage());
        }
    }
}
