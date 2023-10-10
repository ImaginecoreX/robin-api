<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\addresses;
use App\Models\user;
use App\Models\user_fav_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    //register user
    public function registerUser(Request $request)
    {
        $validetor = Validator::make($request->all(), [
            'username' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'bio' => 'required',
            'profile_url' => 'required',
            'points' => 'required',
            'status_id' => 'required',
            'gender_id' => 'required',
        ]);

        if ($validetor->fails()) {
            return response()->json(['err' => $validetor->errors()], 422);
        }

        $findUser = user::where('email', $request->input('email'))->exists();

        if ($findUser) {
            return response()->json(['err' => 'user alredy registered'], 422);
        }

        $findUsername = user::where('username', $request->input('username'))->exists();


        if ($findUsername) {
            return response()->json(['err' => 'user alredy registered'], 422);
        }

        $user = user::create([
            'username' => $request->input('username'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'bio' => $request->input('bio'),
            'profile_url' => $request->input('profile_url'),
            'points' => $request->input('points'),
            'status_id' => $request->input('status_id'),
            'gender_id' => $request->input('gender_id'),
        ])->first();



        // $favCate = user_fav_category::create([
        //     'user_username'=>$request->input('username'),
        //     'category_id'=>$request->input('category_id')
        // ]);

        return response()->json(['new' => $user], 200);
    }

    public function addAddress(Request $request)
    {

        $validetor = Validator::make($request->all(), [
            'city_id' => 'required',
            'line1' => 'required',
            'line2' => 'required',
            'postal_code' => 'required',
            'google_url' => 'required',
            'user_username' => 'required',
        ]);
        if ($validetor->fails()) {
            return response()->json(['err' => $validetor->errors()], 422);
        }


        $address = addresses::create([
            'city_id' => $request->input('city_id'),
            'line1' => $request->input('line1'),
            'line2' => $request->input('line2'),
            'postal_code' => $request->input('postal_code'),
            'google_url' => $request->input('google_url'),
            'user_username' => $request->input('user_username'),
        ]);

        return response()->json(['address' => $address], 200);
    }

    //login user
    public function loginUser(Request $request)
    {
        $findLoginUserData = user::where('username', $request->input('username'))->where('password', $request->input('password'))->exists();

        if (!$findLoginUserData) {
            return response()->json(['err' => 'login faild'], 422);
        }

        $user_data = user::where('username', $request->input('username'))->get();

        return response()->json(['user' => $user_data], 200);
    }

    //update user
    public function updateUser(Request $request, $username)
    {

        $user = user::where('username', $username)->first();

        $user->update($request->all());

        return response()->json(['update' => $user], 200);
    }

    //all user
    public function allUser()
    {
        $allUsers = user::all();
        return response()->json(['allUser' => $allUsers], 200);
    }

    //user block
    public function blockUser(Request $request, $username, $status)
    {

        $find_user = user::where('username', $username)->first();

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

    //block users 
    public function getBlockUsers(Request $request)
    {

        $blockUser = user::where('status_id', '2')->get();

        return response()->json(['blockUsers' => $blockUser], 200);
    }


    //unblock users 
    public function getUnblockUsers(Request $request)
    {

        $unblockUser = user::where('status_id', '1')->get();

        return response()->json(['unblockUsers' => $unblockUser], 200);
    }
}
