<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\insertPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/',[insertPostController::class,'viewAllPost'])->name('home');

///////////////////////////////////////////////////////////////////////////////////////////////

//category specific listing using controller
Route::get('/category/{id}',[insertPostController::class,'showCategorySpecific'])->name('categorySpecific');


//category specific listing using simple route function
//Route::get('/category/{id}', function($id){
//
////    $user = User::find($id);  //find user with given id from user table
////    //this call gives you a separate User Model as an object, which referes perticular one row(tupple) of users table. so we can point out one specific row with mentioned $id in users table
//
//    $post = Post::all()->where('category',$id); //  select * from post where category=$id;
////    dd($post->post);// for checking data
//
//    foreach ($post as $posts){
//        echo $posts->title.'<br>';
//    }
//    }
//)->name('categorySpecific');

///////////////////////////////////////////////////////////////////////////////////////////////

//username specific post via simple function and UI
//Route::get('user/{id}/post',function($id) {
//    $user = User::find($id);
//    foreach ($user->users_post as $post) {
//        echo $post->title . '<br>' .
//            $post->description . '<br>' .
//            $post->tags . '<br>';
//    }
//})->name('usernameSpecificPost');

//username specific post via controller and bootstrap UI
Route::get('/user/{id}/post',[insertPostController::class,'showUsernameSpecificPost'])->name('usernameSpecificPost');

///////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/createPost',[insertPostController::class ,'index'])->name('createPost');
Route::post('/createPost',[insertPostController::class ,'storePost'])->name('storePost');

//tag specific post
Route::get('/tag={id}',[insertPostController::class,'showTagSpecificPost'])->name('tagSpecificPost');


