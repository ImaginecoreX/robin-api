<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_has_categories;
use App\Models\post_has_tag;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //save post
    public function savePost(Request $request)
    {
        $post = post::create([
            'user_username' => $request->input('user_username'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'active' => $request->input('active'),
            'post_type'=>$request->input('post_type')
        ])->first();

        $post_id = $post->id;


        $categories_id = $request->input('categories');

        foreach($categories_id as $category_id){
            $c_id = $category_id['id'];

            post_has_categories::create([
                'category_id'=>$c_id,
                'post_id'=>$post_id,
            ]);
        }

        $tags = $request->input('tags');

        foreach($tags as $tag){
            $tag_name = $tag['name'];

            $findTag = tag::where('tag_name',$tag_name)->exists();

            if(!$findTag){
                $tag_data = tag::create([
                    'tag_name'=>$tag_name,
                ])->first();

                post_has_tag::create([
                    'post_id'=>$post_id,
                    'tag_id'=>$tag_data->id,
                ]);
            }

            $tagSearchRs = tag::where('tag_name',$tag_name)->first();

            post_has_tag::create([
                'post_id'=>$post_id,
                'tag_id'=>$tagSearchRs->id,
            ]);
        }
    }

    //all post
    public function allPost(){

        $post_data = DB::table('post_has_categories')->join('posts','post_has_categories.post_id','=','posts.id')->join('categories','post_has_categories.category_id','=','categories.id')
        ->join('post_has_tags','post_has_categories.post_id','=','post_has_tags.post_id')->join('tags','post_has_tags.tag_id','=','tags.id')->join('users','posts.user_username','=','users.username')->get();

        response()->json(['posts'=>$post_data],200);

    }

    
    //get post
    public function getPost($postId){

        $post_data = DB::table('post_has_categories')->join('posts','post_has_categories.post_id','=','posts.id')->join('categories','post_has_categories.category_id','=','categories.id')
        ->join('post_has_tags','post_has_categories.post_id','=','post_has_tags.post_id')->join('tags','post_has_tags.tag_id','=','tags.id')->join('users','posts.user_username','=','users.username')->where('post_id',$postId)->get();

        response()->json(['post'=>$post_data],200);

    }

     //get post
     public function getUserPost($postId,$username){

        $post_data = DB::table('post_has_categories')->join('posts','post_has_categories.post_id','=','posts.id')->join('categories','post_has_categories.category_id','=','categories.id')
        ->join('post_has_tags','post_has_categories.post_id','=','post_has_tags.post_id')->join('tags','post_has_tags.tag_id','=','tags.id')->join('users','posts.user_username','=','users.username')->where('post_id',$postId)->where('username',$username)->get();

        response()->json(['post'=>$post_data],200);

    }
    
    //edit post
    public function editPost(Request $request,$postId){
        $findPost = post::where('id',$postId)->first();
        $findPost->update($request->all());
    }

    //block post
    public function blockPost($postId,$status){
        $findPost =post::where('id',$postId)->first();
        if($status == true){
            $findPost->active = false;
            $findPost::save();
            return response()->json(['block'], 200);
        }else if ($status == false){
            $findPost->active = true;
            $findPost::save();
            return response()->json(['unblock'], 200);
        }
    }
 
}
