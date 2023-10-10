<?php

namespace App\Http\Controllers;

use App\Models\saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaveController extends Controller
{
    //add save(save fav post)
    public function addSave(Request $request){
        $save = saved::create([
            'user_username'=>$request->input('user_username'),
            'post_id'=>$request->input('post_id')
        ]);

        response()->json(['save'=>$save],200);
    }
    
    //remove save(remove fav post)
    public function removeSave($id){
        $save = saved::find($id);

        if (!$save) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $save->delete();

        return response()->json(['message' => 'Post removed']);
    }

    //get all save 
    public function getSaveAllPost($username){
        $post_data = DB::table('saveds')->join('posts','saveds.post_id','=','posts.id')->join('post_has_categories','saveds.post_id','=','post_has_categories.post_id')->join('categories','post_has_categories.category_id','=','categories.id')
        ->join('post_has_tags','post_has_categories.post_id','=','post_has_tags.post_id')->join('tags','post_has_tags.tag_id','=','tags.id')->join('users','posts.user_username','=','users.username')->where('saveds.user_username')->get();

        response()->json(['posts'=>$post_data],200);
    }
}
