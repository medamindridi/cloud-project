<?php

namespace App\Http\Controllers;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Events\NewChatMessage;
class ChatController extends Controller
{
    public function add(){
        $data = request()->all();
        $user_id = auth()->user()->id;
        $msg = $data["message"];
        $chat = new ChatMessage();
        $chat->user_id = $user_id;
        $chat->message = $msg;
        $chat->save();
        event(new NewChatMessage($msg, auth()->user()->name));
    }
    public function get(){
        $chats = ChatMessage::with('user')->get();
        return view("dashboard",["chats"=> $chats]);
    }
}
