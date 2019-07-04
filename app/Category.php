<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'categories';

    protected function user(){
        return $this->belongsTo('\App\User', 'creator', 'id');
    }

    function child(){
        return $this->hasMany('\App\Category', 'parent_id', 'id');
    }
}