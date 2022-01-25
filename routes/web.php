<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', [PostController::class,'index']);

Route::get('/post/{posts}',[PostController::class,'show']);

Route:: get('/categories/{category}', function(Category $category){
    return view('posts',[
        'posts' => $category->posts]);
});

Route:: get('/authors/{author:username}', function(User $author){
    return view('posts',[
        'posts' => $author->posts, 'categories' => Category::all()]);
});

Route:: get('register',[RegisterController:: class, 'create']);
Route:: post('register', [RegisterController:: class, 'store']);
?>
