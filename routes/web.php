<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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


Route::get("/",function (){

//    dd(Post::all());
    return view("posts",[
        "posts"=> Post::all()
    ]);
});

//---------------------------------------------------------------------------------------------------
Route::get("/posts/{slug}",function ($slug){
    $post=Post::findOrFail($slug);

    return view('post',[
        "file_contant"=> $post
    ]);
});
//->where('slug','[A-z\-\_]+')

