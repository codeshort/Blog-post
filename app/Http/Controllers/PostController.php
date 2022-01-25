<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    Post:: latest();
   // ddd("here");
    $posts = Post::latest()->filter(request(['search','category','author']))->get();
     return view('posts',
     ['posts' => $posts ,'categories' => Category::all() ]);
 
  }

  public function show(Post $posts)
  {
    return view('post',['post'=> $posts]);
  }
}
