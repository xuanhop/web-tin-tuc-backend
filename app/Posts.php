<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected function category()
    {
        return $this->belongsTo('\App\Category', 'category_id', 'id');
    }

    protected function meta()
    {
        return $this->hasMany('\App\Meta', 'post_id', 'id');
    }


}
