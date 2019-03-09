<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected   $table='childcategories';

    public function parent_category()
    {
        return $this->belongsTo('App\ParentCategory');
    }
}
