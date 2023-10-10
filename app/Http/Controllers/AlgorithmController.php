<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlgorithmController extends Controller
{
    //
    public function loadCategory($postId){

        $category = DB::table('post_has_categpries')->join('categories','post_has_categories.category_id','=','categories.id')
        ->where('post_has_categories.post_id',$postId)->get();
        
        return response()->json(["category"=>$category],200);
    
     }

     public function loadTags($postId){

    
        $tags = DB::table('post_has_tags')->join('tags','post_has_tags.tag_id','=','tags.id')
        ->where('post_has_tags.post_id',$postId)->get();
    
        return response()->json(["tags"=>$tags],200);
    
     }

     public function loadPostType($postId){

        $post_type = DB::table('post_type')->join('posts','post_type.id','=','posts.post_type')
        ->where('posts.id',$postId)->get();

        return response()->json(["types"=>$post_type],200);
     }

     public function loadVots($postId){
        
        $votes = DB::table('votes')->join('posts','post.id','=','votes.post_id')
        ->where('posts.id',$postId)->get();

        return response()->json(["votes"=>$votes],200);
     }


     public function loadUsers($postId){

        $postee = DB::table('posts')->join('users','post.user_username','=','users.username')
        ->where('posts.id',$postId)->get();

        return response()->json(["users"=>$postee],200);
     }
}
