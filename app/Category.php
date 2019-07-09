<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

/**
 * App\Category
 *
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @mixin Eloquent
 */
class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;

    protected function user()
    {
        return $this->belongsTo('\App\User', 'creator', 'id');
    }

    function child()
    {
        return $this->hasMany('\App\Category', 'parent_id', 'id');
    }

    public static function store(Request $request)
    {
        $validate = $request->validate([
            'category_name' => 'required'
        ]);
        $categoryName = $request->get('category_name');
        $description = $request->get('description');
        $status = $request->get('status');
        $parent_id = $request->get('parent_category');
        $arr = session('user');
        if ($parent_id != 0) {
            self::insert([
                'name' => $categoryName,
                'description' => $description,
                'status' => $status,
                'parent_id' => $parent_id,
                'creator' => $arr->id
            ]);
        } else {
            self::insert([
                'name' => $categoryName,
                'description' => $description,
                'status' => $status,
                'creator' => $arr->id
            ]);
        }
    }

    public static function softDelete($id)
    {
        self::where('id', '=', $id)->update([
            'status' => -1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        self::where('parent_id', '=', $id)->update([
            'status' => -1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public static function updateCategory(Request $request, $id)
    {
        $categoryName = $request->get('category_name');
        $description = $request->get('description');
        $status = $request->get('status');
        $parent_id = $request->get('parent_category');
        self::where('id', '=', $id)->update([
            'name' => $categoryName,
            'description' => $description,
            'status' => $status,
            'parent_id' => $parent_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}