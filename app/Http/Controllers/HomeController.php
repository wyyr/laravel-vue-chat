<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\Test;
use App\User;
use App\Message;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchMessage() {
        $messages = Message::with('user')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request) {
        $id = $request->get('id');
        $getMessage = $request->get('message');
        $message = new Message();
        $message->user_id = $id;
        $message->content = $getMessage;
        $message->save();

        // event(new MessageSent($message::with('user')->orderBy('id','desc')->first()));
        broadcast(new MessageSent($message::with('user')->orderBy('id','desc')->first()))->toOthers();

        return ['status'=>200];
    }
}
