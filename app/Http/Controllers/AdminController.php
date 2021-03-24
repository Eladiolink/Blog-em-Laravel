<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use  App\Models\Posts;

class AdminController extends Controller
{
    public function create(){
        $categories=Categories::get();

        return view('admin.create',['categories'=>$categories]);
    }

    public function store(Request $request){
        
        Posts::addPost($request);

        return redirect()->route('posts.show');
    
    }
}
