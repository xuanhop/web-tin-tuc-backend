<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function request;

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
        self::specifiedTag($id)->update([
            'tag_name' => $tagName,
        ]);
    }

    public static function store($tagName)
    {
        self::insert([
            'tag_name' => $tagName,
        ]);
    }

    public function scopeSpecifiedTag($query, $id)
    {
        return $query->where('id', $id);
    }

    public static function getTagByLimit($limit){
        return self::with('relation')->orderBy('id', 'DESC')->paginate($limit);
    }
}
