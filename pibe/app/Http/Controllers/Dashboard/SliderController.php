<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Image;
use Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    public function indexJson()
    {
        $model = Slider::all();
        
        $model->each(function($model)
        {
            $model->image = url($model->image);
        });
                
        $data = datatables()->of($model)
        ->addColumn('btn', 'admin.slider.actions')
        ->rawColumns(['btn'])
        ->toJson();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $cover =$request->file('image');
            $fileNameCover = $cover->hashName();
            Image::make($cover)->resize(1280,533)->save('img_web/sliders/' .$fileNameCover);
        }

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'position' => $request->position,
            'image' => "img_web/sliders/$fileNameCover",
        ]);
        Alert::success('Slider creado correctamente');
        return redirect('admin/slider'); 
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->image = url($slider->image);
        return view('admin.slider.edit',[
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax())
        {
            foreach($request->items as $key=>$value)
            {
                $slider = Slider::findOrFail($value);
                $slider->position = $key;
                $slider->save();
            }
            return 'succes';            
        }
        else
        {
            $slider = Slider::findOrFail($id);
            $slider->title =$request->title;
            $slider->subtitle = $request->subtitle;
            $slider->position = $request->position;
            $slider->url = $request->url;
            
            if($request->hasFile('image'))
            {
                $cover =$request->file('image');
                $fileNameCover = $cover->hashName();
                Image::make($cover)->resize(1280,533)->save('img_web/sliders/' .$fileNameCover);
                \File::delete($slider->image);   
                $slider->image = "img_web/sliders/$fileNameCover";
            }
            $slider->save();
            Alert::success('Slider actualizado correctamente');
            return redirect('admin/slider');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        \File::delete($slider->image);             
        $slider->delete();
        return back();
    }
}
