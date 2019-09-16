<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	public $table = 'categories';
    protected $fillable = ['name','status','image','slug'];


    public function category_parent(){

    	return $this->belongsToMany(Category::class,'category_parents','category_id','parent_id');
    }

     public function category_child(){

    	return $this->belongsToMany(Category::class,'category_parents','parent_id','category_id');
    }

   public function greatgrandfather()
      {
         return $this->belongsToMany(Category::class,'category_parents');
      }


    public function category_post(){

    	return $this->belongsToMany('App\Post','category_post','category_id','post_id')->withTimestamps();
    }
}
