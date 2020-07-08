<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $message = Message::create([
            'text' => $request->text,
            'order_id' => $request->order_id,
            'user_id' => Auth('user')->user()->id
        ]);
        
        $message->date = $message->created_at->diffForHumans();
        return $message;
    }

    public function customer(Request $request)
    {
        $message = Message::create([
            'text' => $request->text,
            'order_id' => $request->order_id,
            'customer_id' => Auth('web')->user()->id
        ]);
        
        $message->date = $message->created_at->diffForHumans();
        return $message;
    }

}
