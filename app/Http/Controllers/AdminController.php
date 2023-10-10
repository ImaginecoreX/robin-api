<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\categories;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    //add admin
    public function addAdmin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required',
            'admin_type_id' => 'required',
            'admin_status_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['err' => $validator->errors()], 422);
        }

        $findAdmin = admin::where('email', $request->input('email'))->exists();

        if ($findAdmin) {
            return response()->json(['err' => 'admin already registered'], 422);
        } else {
            $adminData = admin::create([
                'email' => $request->input('email'),
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'password' => $request->input('password'),
                'admin_type_id' => $request->input('admin_type_id'),
                'admin_status_id' => $request->input('admin_status_id'),
            ]);
        }

        return response()->json(['newAdmin' => $adminData], 200);
    }

    //update admin
    public function updateAdmin(request $request, $email)
    {
        $admin = admin::where('email', $email)->first();
        $admin->update($request->all());

        return response()->json(['message' => 'Sucess'], 200);
    }

    //admin block
    public function blockAdmin(Request $request, $username, $status)
    {

        $find_user = admin::where('username', $username)->first();

        if ($status == "1") {
            $find_user->status_id = '2';
            $find_user->save();
            return response()->json(['unblock'], 200);
        } else if ($status == "2") {
            $find_user->status_id = "1";
            $find_user->save();
            return response()->json(['block'], 200);
        }
    }

    //add category
    public function addCategory(Request $request){
        $category = categories::create([
            'c_name'=>$request->input('c_name'),
        ]);

        return response()->json(['msg'=>'add tag'],200);
    }
    //add tags
    public function addTag(Request $request){
        $tag = tag::create([
            'tag_name'=>$request->input('tag_name'),
        ]);

        return response()->json(['msg'=>'add tag'],200);
    }

}
