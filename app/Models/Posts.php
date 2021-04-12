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
        $post=$request->only('title','resumo','body');

        if($request->has('image')){
          $nameFile= Str::slug($request->title,'-')."-". Str::slug(date('Y-m-d H:i:s')) . "." . $request->image->getClientOriginalExtension();
          $post['image']=$nameFile;
          $file =  $request->image->storeAs('posts',$nameFile);
        }
          
        $postBD=Posts::create($post);

        if($request->has('category')){
           $postBD->categories()->sync($request->category);
        } 
       
    }

    public static function updatePost($request,$id){
        
         $post=$request->only('title','resumo','body');

        if($request->has('image')){
          $nameFile= Str::slug($request->title,'-')."-". Str::slug(date('Y-m-d H:i:s')) . "." . $request->image->getClientOriginalExtension();
          $post['image']=$nameFile;
          $file =  $request->image->storeAs('posts',$nameFile);
        }
          
        $postBD=Posts::where('id',$id)->update($post);

        if($request->has('category')){
           $postBD->categories()->sync($request->category);
        } 
        
    }

    public function categories(){
        return $this->belongsToMany(Categories::class)->withTimestamps();;
    }
}
