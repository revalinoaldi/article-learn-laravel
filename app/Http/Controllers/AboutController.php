<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'About',
            'name' => 'Farhan Aldiansyah',
            'email' => 'farhan.aldiansyah245@gmail.com',
            'image' => 'avatar.png'
        ]);
    }
}
