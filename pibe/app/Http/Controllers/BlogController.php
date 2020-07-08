<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\BlogCategory;


class BlogController extends Controller
{


	public function blog()
	{
		$posts = Post::orderBy('id', 'DESC')->paginate(6);
		$categories = BlogCategory::all();
		$tags = Tag::all();
		return view('blog.blog', compact('posts', 'categories', 'tags'));
	}

	public function post($slug)
	{
		$post = Post::where('slug', $slug)->first();
		$categories = BlogCategory::all();
		$tags = Tag::all();
		return view('blog.blogDetail', compact('post', 'categories', 'tags'));
	}
	//Uno a muchos
	public function category($slug)
	{
		$categoria = BlogCategory::where('slug', $slug)->pluck('id')->first();
		$categories = BlogCategory::all();
		$tags = Tag::all();
		$posts = Post::where('id', $categoria)
				 ->orderBy('id', 'DESC')->paginate(3);
		return view('blog.blog', compact('posts', 'categories', 'tags'));
	}
	//Muchos a muchos
	public function tag($slug)
	{
		$categories = BlogCategory::all();
		$tags = Tag::all();
		$posts = Post::whereHas('tags', function($query) use($slug){
			$query->where ('slug', $slug);
		})->orderBy('id', 'DESC')->paginate(2);
		return view('blog.blog', compact('posts', 'categories', 'tags'));
	}

}
