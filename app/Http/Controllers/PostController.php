<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{ 
    // VIEW A BLOG POST
    public function show($slug)
   {
   
       return view('post', [
           'post' => Post::where('slug', '=', $slug)->first()
       ]);
   }

//STORE A BLOG POST
   public function store(Request $request)
   {
       $post = new Post;

       $post->title = $request->title;
       $post->body = $request->body;
       $post->slug = $request->slug;

       $post->save();

       return response()->json(["result" => "ok"], 201);
   }

//UPDATE A BLOG POST
public function update(Request $request, $postId)
   {
       $post = Post::find($postId);
       $post->title = $request->title;
       $post->body = $request->body;
       $post->slug = $request->slug;
       $post->save();

       return response()->json(["result" => "ok"], 201);       
   }

   
//DELETE A BLOG POST
public function destroy($postId)
{
    $post = Post::find($postId);
    $post->delete();

    return response()->json(["result" => "ok"], 200);       
}

}
