<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'user_id', 'post_content', "post_date", "category_id", "image_url"];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    // public function author(){
    //     return $this->belongsTo('App\User', 'user_id' );
    // }
}