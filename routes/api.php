<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//http://localhost:8000/api

///////////////////////////////////user///////////////////////////////////////

//user registration 
//http://localhost:8000/api/reg-user
Route::post('/reg-user',[UserController::class,'registerUser']);

//login user
//http://localhost:8000/api/login-user
Route::post('/login-user',[UserController::class,'loginUser']);

//http://localhost:8000/api/add-user-address
Route::post('/add-user-address',[UserController::class,'addAddress']);

//http://localhost:8000/api/update-user
Route::put('/update-user',[UserController::class,'updateUser']);

//http://localhost:8000/api/all-user
Route::put('/all-user',[UserController::class,'allUser']);

//http://localhost:8000/api/blockUser/{username}/{status}
Route::get('/blockUser/{username}/{status}',[UserController::class,'blockUser']);

//http://localhost:8000/api/get-block-users
Route::get('/get-block-users',[UserController::class,'getBlockUsers']);

//http://localhost:8000/api/get-unblock-users
Route::get('/get-unblock-users',[UserController::class,'getUnblockUsers']);

//////////////////////////////////////////////Admin///////////////////////////////

//http://localhost:8000/api/add-admin
Route::post('/add-admin',[AdminController::class,'addAdmin']);

//http://localhost:8000/api/update-admin/{email}
Route::put('/update-admin/{email}',[AdminController::class,'updateAdmin']);

//http://localhost:8000/api/block-admin/{username}/{status}
Route::get('/block-admin/{username}/{status}',[AdminController::class,'blockAdmin']);

//////////////////////////////////////////////Chat///////////////////////////////

//http://localhost:8000/api/send-msg
Route::post('/send-msg',[Chatcontroller::class,'sendMsg']);

//http://localhost:8000/api/update-msg/{id}
Route::put('/update-msg/{id}',[Chatcontroller::class,'msgState']);

//http://localhost:8000/api/search-chat
Route::get('/search-chat',[Chatcontroller::class,'findChat']);



//////////////////////////////////////////////Post///////////////////////////////

//http://localhost:8000/api/save-post
Route::post('/save-post',[PostController::class,'savePost']);

//http://localhost:8000/api/all-posts
Route::post('/all-posts',[PostController::class,'allPost']);

//http://localhost:8000/api/get-post/{postId}
Route::get('/get-post/{postId}',[PostController::class,'getPost']);

//http://localhost:8000/api/get-user-post/{postId}/{username}
Route::get('/get-user-post/{postId}/{username}',[PostController::class,'getUserPost']);

//http://localhost:8000/api/edit-post/{postId}
Route::put('/edit-post/{postId}',[PostController::class,'editPost']);

//http://localhost:8000/api/block-post/{postId}/status
Route::get('/block-post/{postId}',[PostController::class,'blockPost']);

//////////////////////////////////////////////Vote///////////////////////////////
//http://localhost:8000/api/add-vote
Route::post('/add-vote',[commentController::class,'addVote']);


/////////////////////////////////////////////comment///////////////////////////////
//http://localhost:8000/api/add-comment
Route::post('/add-comment',[commentController::class,'addComment']);

//http://localhost:8000/api/update-comment/{commentId}
Route::put('/update-comment/{commentId}',[commentController::class,'commentState']);

//http://localhost:8000/api/update-reply/{replyId}
Route::put('/update-reply/{replyId}',[commentController::class,'replyState']);

//http://localhost:8000/api/add-comment-report
Route::get('/add-comment-report',[commentController::class,'commentReport']);

//http://localhost:8000/api/add-reply-report
Route::get('/add-reply-report',[commentController::class,'replyReport']);
