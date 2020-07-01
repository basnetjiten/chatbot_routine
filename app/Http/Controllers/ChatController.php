<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('chat.chat');
    }

    public function fetchAllMessages(Request $request)
    {
        return Chat::with('user')->where('user_id',$request->id)->get();
    }

    public function fetchAllMessagesForAdmin()
    {
        return Chat::with('user')->get();
    }


    public function sendMessage(Request $request)
    {
        $chat = auth()->user()->messages()->create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'receiverid' => $request->id
        ]);


        if ($chat) {
            broadcast(new ChatEvent($chat->load('user')))->toOthers();

            return ['status' => 'success'];
        }
    }
}
