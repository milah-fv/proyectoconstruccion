<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
Use Alert;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view ('admin.category.index',[
            'categories' => $categories,
        ]);
    }

 
    public function create()
    {
        return view('admin.category.create');
    }

  
    public function store(CategoryRequest $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        if($request->ajax())
        {
            return response()->json($category);
        }
        Alert::success('Categoría creada correctamente');
        return redirect('/admin/category');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category' =>$category]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        Alert::success('Categoría actualizada correctamente');
        return redirect('/admin/category');
    }

  
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Alert::info('Categoría eliminada correctamente');
        return response()->json($category);
    }
}
