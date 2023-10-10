<?php

namespace App\Http\Controllers;

use App\Models\vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    //add vote
    public function addVote(Request $request){
        $voteData = vote::create([
            'user_username'=>$request->input('user_username'),
            'post_id'=>$request->input('post_id'),
            'vote_type_id'=>$request->input('vote_type_id'),
        ]);

        response()->json(['msg'=>'sucess'],200);
    }
}
