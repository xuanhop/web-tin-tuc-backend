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

    public function user()
    {
        return $this->belongsTo('\App\User', 'creator', 'id');
    }

    public function child()
    {
        return $this->hasMany('\App\Category', 'parent_id', 'id');
    }

    public static function store($categoryName, $description, $status, $parent_id)
    {
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

    public function scopeDisable($query)
    {
        return $query->where('status', '=', -1);
    }

    public function scopeIndex($query)
    {
        return $query->where('status', '=', 1);
    }

    public function scopeCategories($query)
    {
        return $query->where('parent_id', 0)->where('status', '=', 1)->with('child');
    }

    public static function softDelete($id)
    {
        self::specify($id, 'id')->update([
            'status' => -1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        self::specify($id, 'parent_id')->update([
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
        self::specify($id, 'id')->update([
            'name' => $categoryName,
            'description' => $description,
            'status' => $status,
            'parent_id' => $parent_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function scopeSpecify($query, $id, $target)
    {
        return $query->where($target, '=', $id);
    }

    public static function countCategories()
    {
        return Category::all()->count();
    }
}