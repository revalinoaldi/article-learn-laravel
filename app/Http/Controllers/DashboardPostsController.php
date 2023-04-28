<?php

namespace App\Http\Controllers;

use App\Models\{Category, Posts};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Posts::latest()
                        ->with('category')
                        ->where('user_id', auth()->user()->id)
                        ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255|min:4',
            'slug' => 'required|max:255|unique:posts|min:4',
            'kategori' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required||min:4'
        ]);

        if ($request->file('image')) {
            $valid['image'] = $request->file('image')->store('post-images');
        }

        $is_success = Posts::create([
            'title' => $valid['title'],
            'slug' => $valid['slug'],
            'category_id' => $valid['kategori'],
            'body' => $valid['body'],
            'image' => $valid['image'],
            'user_id' => auth()->user()->id,
            'excerpt' => Str::limit(strip_tags($valid['body']), 125, '...')
        ]);
        
        if ($is_success) {
            return redirect('/dashboard/posts')->with('notif','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfull!</strong> Post Successfull Created, you can see it right now!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }else{
            return redirect('/dashboard/posts/create')->with('notif','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Created Post Unsuccessfull, please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        
        return view('admin.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view('admin.posts.create',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $rules = [
            'title' => 'required|max:255|min:4',
            'kategori' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required||min:4'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|max:255|unique:posts|min:4';
        }

        $valid = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $valid['image'] = $request->file('image')->store('post-images');
        }

        $data = [
            'title' => $valid['title'],
            'category_id' => $valid['kategori'],
            'body' => $valid['body'],
            'image' => $valid['image'],
            'user_id' => auth()->user()->id,
            'excerpt' => Str::limit(strip_tags($valid['title']), 125, '...')
        ];

        if (@$valid['slug']) {
            $data['slug'] = $valid['slug'];
        }

        $is_success = Posts::where('id', $post->id)->update($data);
        
        if ($is_success) {
            return redirect('/dashboard/posts')->with('notif','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfull!</strong> Post Successfull Updated, you can see it right now!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }else{
            return redirect("/dashboard/posts/{$post->slug}/edit")->with('notif','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Updated Post Unsuccessfull, please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        
        $is_success = Posts::destroy($post->id);
        if ($is_success) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            return redirect('/dashboard/posts')->with('notif','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfull!</strong> Post Successfull Deleted!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }else{
            return redirect('/dashboard/posts/create')->with('notif','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Deleted Post Unsuccessfull, please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);
        return response()->json([
            'slug' => $slug
        ]);
    }
}
