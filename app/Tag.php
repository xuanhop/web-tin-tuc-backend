<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function relation(){
        return $this->hasMany('App\Relation', 'tag_id', 'id');
    }
}
