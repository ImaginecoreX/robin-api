<?php

namespace App\Http\Controllers;

use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Chatcontroller extends Controller
{
    //
    public function sendMsg(Request $request){
        $validator = Validator::make($request->all(),[
            'user_from'=>'required',
            'user_to'=>'required',
            'msg'=>'required',
            'date'=>'required',
            'msg_status_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['err'=> $validator->errors()],422);
        }
        
        $msgData = chat::create([
            'user_from'=>$request->input('user_from'),
            'user_to'=>$request->input('user_to'),
            'msg'=>$request->input('msg'),
            'date'=>$request->input('date'),
            'msg_status_id'=>$request->input('msg_status_id'),
        ]);

        return response()->json(['newMsg'=>$msgData],200);
    }

    public function loadChat(Request $request){
        
    }
}
