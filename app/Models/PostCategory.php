<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable=["post_id","category_id"];
    use HasFactory;

    public static function addPostCategory($postId,$categories){
         foreach($categories as $category){
            $post_category=[
                "post_id"=>$postId,
                "category_id"=>$category
            ];
            PostCategory::create($post_category);
         }


        }

   
        public static function updatePostCategory($postId,$categories){  
        PostCategory::where('post_id',$postId)->delete();  
        foreach($categories as $category){
            $post_category=[
                  "post_id"=>$postId,
                "category_id"=>$category
             ];
              
              PostCategory::create($post_category);
          }
        }  
        
        
      
        
    




    }
