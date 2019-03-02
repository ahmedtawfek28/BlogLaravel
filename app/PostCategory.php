<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'category_post';
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function tag()
    {
        return $this->belongsTo('App\Category');
    }
}
