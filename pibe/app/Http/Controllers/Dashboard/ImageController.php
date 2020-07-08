<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\ProductImage;
use Illuminate\Http\Request;
use Image;

use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{


    public function index()
    {
      $images = ProductImage::all();

      return view('admin.image.index', ['images' => $images]);
    }

    public function store(ImageRequest $request)
    {

        if($request->hasFile('fileInput'))
          {
            $cover = $request->file('fileInput');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(500,500)->save('img_product/' .$fileNameCover);
          }

        $image = new ProductImage();
        $image->image = $fileNameCover;
        $image->product_id = $request->imageProductId;
        $image->save();
        return response()->json($image);

    }
    public function destroy($id)
    {
      $image = ProductImage::findOrFail($id);
      \File::delete("img_product/$image->image");
      $image->delete();

      return response()->json();
    }
}
