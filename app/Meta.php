<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

/**
 * App\Meta
 *
 * @method static Builder|Meta newModelQuery()
 * @method static Builder|Meta newQuery()
 * @method static Builder|Meta query()
 * @mixin Eloquent
 */
class Meta extends Model
{

    protected $table = 'meta';

    public $timestamps = false;

    function saveData($id){
        $this->data = request()->content_text;
        $this->post_id = $id;
        $this->save();
    }

}