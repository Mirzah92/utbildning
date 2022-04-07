<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        $post = Post::all();

       return view('posts.index', [
           'posts' => $post
       ]);
    }

    /*Route model binding  händer här, Post hämtar alla facit arrayer,metoder som ex findORFail
    och assignar de till $post variabeln*/
    public function show(Post $post)
    {
        /*$post = Post::findOrFail($id);*/

        return view('posts.show', ['post' => $post]);
    }


    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {



        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
            /*'slug' => 'required|unique:posts,slug',
            'user_id' => [
              'required',
              Rule::unique('posts')->ignore($request)
            ],
            'category_id' => [
                'required',
                Rule::unique('posts')->ignore($request)
            ],*/
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit',compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
            /*'slug' => [
                'required',
              Rule::unique('posts')->ignore($post)
            ],
            'user_id' => [
                'required',
            Rule::unique('posts')->ignore($post),
            ],*/
            'category_id' => [
                'required',
             /*Rule::unique('posts')->ignore($post)*/
            ]
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success','Post deleted successfully');
    }

}
