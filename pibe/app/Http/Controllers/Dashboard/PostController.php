<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Image;
use App\Post;
use App\Tag;
use App\BlogCategory;
use Yajra\DataTables\EloquentDataTable;
Use Alert;

class PostController extends Controller
{
    public function index()
    {
      	$posts = Post::latest()->get();

		return view('admin.post.index',
		[
          'posts' => $posts,
        ]);
	}

	public function indexJson()
    {
		$model = Post::all();
        
        $model->each(function($model)
        {   
            $model->name;
            $model->image = url($model->image);
			$model->user;
            // $model->tags;
			$model->blog_category;
        });
                
        $data = datatables()->of($model)
        ->addColumn('btn', 'admin.post.actions')
        ->rawColumns(['btn'])
        ->toJson();
        return $data;
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();

        return view('admin.post.create',[
          'categories' => $categories,
          'tags' => $tags,

        ]);
    }

    public function store(PostRequest $request)
    {
        $cover =$request->file('image');
        $fileNameCover = $cover->hashName();
        Image::make($cover)->resize(1170,555)->save('img_post/' .$fileNameCover);

        $post = Post::create([
           'user_id' =>$request->user_id,
           'name' =>$request->name,
           'slug' =>$request->slug,
           'abstract' =>$request->abstract,
           'image' => ("img_post/$fileNameCover"),
           'body' =>$request->body,
           'blog_category_id' => $request->categories,
           
        ]);
         $post->tags()->sync($request->get('tags'));
        

        Alert::success('Post creado correctamente');
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        $postTagId = [];

        foreach ($post->tags as $postTag) 
        {
            $postTagId[] = $postTag->id;
        }


        return view('admin.post.edit',[
            'categories' => $categories,
            'tags' => $tags,
            'post' => $post,
            'postTagId' => $postTagId,
        ]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        //$values = $data[$request->sizes['name' => $request->quantities]];
        
                
        if($request->hasFile('image'))
        {
            $cover =$request->file('image');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(1170,555)->save('img_post/' .$fileNameCover);
            \File::delete('img_post/'.$post->image);

            $post->image = "img_post/$fileNameCover";
        }

         $post->tags()->sync($request->get('tags'));
        
        $post->user_id = $request->user_id;
        
        $post->slug = $request->slug;
        $post->abstract =$request->abstract;
        $post->body =$request->body;
        $post->blog_category_id = $request->categories;
        $post->name = $request->name;

        $post->save();
        Alert::success('Post actualizado correctamente');
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->detach($post->tags);

        $image = $post->image;
        \File::delete('img_post/'.$image);

        $post->delete();
        return response()->json($post);

    }
}
