<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //

    public function search(Request $request){


    	$posts = Post::search($request->text)->get();

    	return view('search',compact('posts'));

    }


    public function storePost(Request $request){


        $request->validate([

            'title' => 'required',
            'post' => 'required',
        ]);


    	$post = new Post();

    	$post->title = $request->title;
    	$post->post = $request->post;

    	$post->save();

    	return redirect()->back()->with('success','Post saved!');

    }
}
