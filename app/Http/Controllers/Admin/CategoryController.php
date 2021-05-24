<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Categories::all(),
        ]);
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.categories.edit', [
            'category'=>$category
        ]);
    }

}
