<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

    public function  create() {
        $categories = Categories::all();
        return view("posts.create");
    }

    public function store(Request $request) :RedirectResponse
    {
        //
        $request->validate([
            "title" => "required|max:255",
            "body" => "required"
        ]);

        Post::create([
            "title" => $request->title,
            "body" => $request->body
        ]);

        return redirect()->route("dashboard")->with("success", "New Post Has Been Added");
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $posts = Post::findOrFail($id);

        return view("posts.show", [
            "posts" => $posts
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view("posts.edit", [
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $request->validate([
            "title" => "required|max:255",
            "body" => "required"
        ]);

        $post->update([
            "title" => $request->title,
            "body" => $request->body,
        ]);

        return redirect()->route("posts.show", $post->id)->with("success", "Edited Succesfully!");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route("dashboard")->with("success", "Post $post->id Already  Got Deleted  " );
    }
}
