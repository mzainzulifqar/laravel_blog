<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

	public $table = 'categories';
    protected $fillable = ['name','status','image'];


    public function category_parent(){
    	
    	return $this->belongsToMany(Category::class,'category_parents','category_id','parent_id');
    }
}
