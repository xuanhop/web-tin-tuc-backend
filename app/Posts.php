<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

/**
 * App\Posts
 *
 * @method static Builder|Posts newModelQuery()
 * @method static Builder|Posts newQuery()
 * @method static Builder|Posts query()
 * @mixin Eloquent
 */
class Posts extends Model
{
    protected $table = 'posts';

    protected function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function meta()
    {
        return $this->hasMany('App\Meta', 'post_id', 'id');
    }

    /**
     * @effects: Insert into database and return id in the same time
     * @param $array
     * @return int
     */
    public function insertGetId($array)
    {
        $id = DB::table($this->table)->insertGetId($array);
        return $id;
    }
}
