<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use  App\Models\Posts;

class AdminController extends Controller
{   

    public function show(){
        $posts=Posts::get();
        return view('admin.show',['posts'=>$posts]);

    }

    public function create(){
        $categories=Categories::get();

        return view('admin.create',['categories'=>$categories]);
    }
    
    public function edit($id){
        $categories=Categories::get();
        $post=Posts::where('id',$id)->first();
        return view("admin.edit",["post"=>$post,"categories"=>$categories]);
    }

    public function store(Request $request){
        
        Posts::addPost($request);

        return redirect()->route('posts.show');
     
    }
}
