<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Posts extends Model
{   
    protected $fillable=['title','resumo','body','image'];
    use HasFactory;

    public static function addPost(Request $request){
        $categories=$request->except('title','resumo','_token','image','body');
        $nameFile= Str::slug($request->title,'-')."-". Str::slug(date('Y-m-d H:i:s')) . "." . $request->image->getClientOriginalExtension();
        $post=$request->only('title','resumo','body');
        $post['image']=$nameFile;
        
        if($request->image->isValid()){
          $file =  $request->image->storeAs('posts',$nameFile);
          $postBD=Posts::create($post);
          PostCategory::addPostCategory($postBD->id,$categories);
        }else{
            return false;
        }

            return true;
       
    }

    public static function updatePost($request,$id){
        $categories=$request->except('title','resumo','_token','image','body','_method');
        $post=$request->only('title','resumo','body');

       
        
        if($request->image != null){
         $nameFile= Str::slug($request->title,'-')."-". Str::slug(date('Y-m-d H:i:s')) . "." . $request->image->getClientOriginalExtension();
          $post['image']=$nameFile;
          $file =  $request->image->storeAs('posts',$nameFile);
        }

         $postBD=Posts::where('id',$id)->update($post);
         
         if($categories!=null){
            PostCategory::updatePostCategory($id,$categories);
         }

        
    }

    public static function getCategories(){
        //return this->belongsToMany(Categories::class,'post_categories','post_id','category_id');
    }
}
