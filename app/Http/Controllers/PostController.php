<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts',[
            'title' => 'All Posts',
            'posts' => Posts::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
        ]);
    }
    
    public function show(Posts $post)
    {
        return view('post',[
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
}
