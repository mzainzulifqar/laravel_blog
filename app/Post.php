<?php

namespace App;
use App\Tag;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','images','slug','body','user_id','status','created_at'];


    public function tags(){
    	return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }

    public function category()
    {
    	return $this->belongsToMany('App\Category','category_post','post_id','category_id')->withTimestamps('created_at');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
