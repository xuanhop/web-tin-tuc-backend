<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function relation()
    {
        return $this->hasMany('App\Relation', 'tag_id', 'id');
    }

    public static function instance()
    {
        return new Tag();
    }

    public static function updateTag($id)
    {
        $tagName = request('tag_name');
        self::where('id', $id)->update([
            'tag_name' => $tagName,
        ]);
    }

    public static function store()
    {

        self::insert([
            'tag_name' => \request('tag_name'),
        ]);

    }
}
