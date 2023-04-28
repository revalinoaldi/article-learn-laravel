<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author',[
            'title' => 'Category',
            'authors' => User::all()
        ]);
    }
    public function show(User $author)
    {
        return view('posts',[
            'title' => 'Post By Author : '.$author->name,
            'name' => $author->name,
            'posts' => $author->posts->load('category','author')
        ]);
    }
}
