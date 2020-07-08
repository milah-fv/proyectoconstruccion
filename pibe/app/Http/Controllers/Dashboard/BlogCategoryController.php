<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use App\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    public function store(BlogCategoryRequest $request)
    {
        $blogCategory = BlogCategory::create([
          'name' => $request->name,
          'slug' => $request->slug,
        ]);

        return response()->json($blogCategory);
    }
}
