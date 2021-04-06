<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function show(){
        $posts=Posts::get();
        return view('posts.show',["posts"=>$posts]);
    }

    public function showPost($id){
        $post=Posts::where("id",$id)->first();
        return view("posts.showPost",['post'=>$post]);
    }
}
