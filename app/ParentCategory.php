<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
        
    protected   $table='parentcategories';
    public function childcategories()
    {
        return $this->hasMany('App\ChildCategory');
    }
}
