<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  App\Models\{Posts,PostCategory};
use App\Http\Requests\UpdatePostRequest;

class AdminController extends Controller
{   

    public function show(){
        $posts=DB::table('posts')->paginate(5);
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

    public function update(UpdatePostRequest $request,$id){
          
        $post=$request->except('_token','_method');
        
        if(isset($post['image'])){
            $post['image']=Posts::image($request);
        }

         DB::beginTransaction();
           $postDB=Posts::find($request->id);
           $postDB->update($post);
           $postDB->categories()->sync($request->category);
              
         DB::Commit();


         return redirect()->route('admin.show');
        
    }

    public function destroy($id){
            DB::beginTransaction();
             $post= Posts::find($id);
             Storage::delete("posts/".$post->image);
             $post->categories()->detach();
             $post->delete();
            DB::Commit();
            return redirect()->back();
    }

    public function destroyCategory($id){
           
            DB::beginTransaction();
             $category= Categories::find($id); 
             $category->posts()->detach();
             $category->delete();
            DB::Commit();
            return redirect()->back();

           return redirect()->back();
    }
}
