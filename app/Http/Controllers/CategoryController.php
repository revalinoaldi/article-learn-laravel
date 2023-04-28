<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category',[
            'title' => 'Category',
            'categories' => Category::all()
        ]);
    }
    public function show(Category $category)
    {
        return view('posts',[
            'title' => 'Post By Category : '.$category->name,
            'posts' => $category->posts->load('category','author')
        ]);
    }
}
