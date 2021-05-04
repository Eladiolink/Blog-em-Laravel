<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Posts,PostCategory,Categories};

class PostsController extends Controller
{
    public function show(){
       
        $posts=Posts::get();
        return view('posts.show',["posts"=>$posts]);
    }

    public function showPost($id){
        $post=Posts::where("id",$id)->first();
       // $PostCategories=Posts::getCategories();

        //dd($PostCategories);

        return view("posts.showPost",['post'=>$post]);
    }
}
