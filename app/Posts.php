<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

/**
 * App\Posts
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts query()
 * @mixin \Eloquent
 */
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

    /**
     * @effects: Insert into database and return id in the same time
     * @param $array
     * @return int
     */
    public function insertGetId($array){
        $id = DB::table($this->table)->insertGetId($array);
        return $id;
    }
}
