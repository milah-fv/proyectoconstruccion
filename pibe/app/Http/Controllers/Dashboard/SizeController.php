<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Size;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function store(SizeRequest $request)
    {
       $size = Size::create([
        'name' => $request->name,
      ]);

      return response()->json($size);
    }

    
}
