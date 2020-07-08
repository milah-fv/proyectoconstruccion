<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function store(TagRequest $request)
    {
        $tag = Tag::create([
          'name' => $request->name,
          'slug' => $request->slug,
        ]);

        return response()->json($tag);
    }
}
