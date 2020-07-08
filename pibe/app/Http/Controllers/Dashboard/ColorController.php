<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
	public function index()
    {
        //
    }
    
    public function store(Request $request)
    {
        $color = Color::create([
          'color' => $request->color,
        ]);

        return response()->json($color);
    }

}
