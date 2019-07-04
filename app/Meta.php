<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

/**
 * App\Meta
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meta query()
 * @mixin \Eloquent
 */
class Meta extends Model
{

    protected $table = 'meta';

    public $timestamps = false;


}