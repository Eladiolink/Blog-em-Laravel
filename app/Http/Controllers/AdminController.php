<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  App\Models\{Posts,PostCategory};

class AdminController extends Controller
{   

    public function show(){
        $posts=DB::table('posts')->paginate(3);
        $categories=Categories::get();
        return view('admin.show',['posts'=>$posts,'categories'=>$categories]);
    }

    public function create(){
        $categories=Categories::get();

        return view('admin.create',['categories'=>$categories]);
    }

    public function addCategories(){
        return view('admin.createCategories');
    }
    
    public function edit($id){
        $categories=Categories::get();
        $post=Posts::where('id',$id)->first();
        return view("admin.edit",["post"=>$post,"categories"=>$categories]);
    }

    public function editCategory($id){
        $category=Categories::where('id',$id)->first();
        return view("admin.editCategories",["category"=>$category]);
    }

    public function store(Request $request){
        
        Posts::addPost($request);

        return redirect()->route('posts.show');
     
    }
    
    public function storeCategories(Request $request){
      $category=Categories::create($request->only('category'));

      if($category){
           return redirect()->route('admin.show');
      }

    }
    
    public function updateCategory(Request $request,$id){
        $category=Categories::where('id',$id)->update(['category'=>$request->category]);

        if($category){
             return redirect()->route('admin.show');
        }
    }
    public function destroy($id){
            $post= Posts::where('id',$id)->first();
            PostCategory::where('post_id',$id)->delete();
            Posts::where('id',$id)->delete();
            Storage::delete("posts/".$post->image);
   
            return redirect()->back();
    }

    public function destroyCategory($id){
           $category_posts= PostCategory::where('category_id',$id)->delete();   
           Categories::where("id",$id)->delete();
        

           return redirect()->back();
    }
}
