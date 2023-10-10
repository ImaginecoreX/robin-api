<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\comment_report;
use App\Models\reply;
use App\Models\reply_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    
    //create comment
    public function addComment(request $request){
        $validator = Validator::make($request->all(),[
            'body'=>'required',
            'status_id'=>'required',
            'post_id'=>'required',
            'user_username'=>'required',
        ]);
        
        if($validator->fails()){
            return response()->json(['err'=> $validator->errors()],422);
        }

        $commentData = comment::create([
            'body'=>$request->input('body'),
            'status_id'=>$request->input('status_id'),
            'post_id'=>$request->input('post_id'),
            'user_username'=>$request->input('user_username'),
        ]);

        return response()->json(['newComment'=>$commentData],200);
    }

//update comment(status)
    public function commentState(Request $request, $id){
        $comment = comment::where('id',$id)->first();
        $comment->update($request->all());

        return response()->json(['message'=>'Sucess'],200);

    }

//update reply(status)
    public function replyState(Request $request, $id){
        $reply = reply::where('id',$id)->first();
        $reply->update($request->all());

        return response()->json(['message'=>'Sucess'],200);

    }

//create comment report
    public function commentReport(Request $request){
        
        $findReport= comment_report::where('username',$request->input('username'))->where('comment_id',$request->input('comment_id'))->exists();

        if($findReport){
            return response()->json(['err'=>'Already reported'],422);
        }
        else{
            $c_reportData = comment_report::create([
                'comment_id'=>$request->input('comment_id'),
                'username'=>$request->input('username'),
                
            ]);
        }

        return response()->json(['newReport'=>$c_reportData],200);

    }

//create reply report
    public function replyReport(Request $request){
        
        $findReport= reply_report::where('username',$request->input('username'))->where('reply_id',$request->input('reply_id'))->exists();

        if($findReport){
            return response()->json(['err'=>'Already reported'],422);
        }
        else{
            $r_reportData = reply_report::create([
                'reply_id'=>$request->input('reply_id'),
                'username'=>$request->input('username'),
                
            ]);
        }
        return response()->json(['newReport'=>$r_reportData],200);

    }


}
