<?php

namespace App;

use Eloquent;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
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
    protected $guarded = [];

    public function category()
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
    public static function insertGetId($array)
    {
        $id = DB::table('posts')->insertGetId($array);
        return $id;
    }

    /**
     * @return Factory|View
     */
    public function scopePosts($query)
    {
        return $query->where('status', '=', 1);
    }

    /**
     * @return mixed
     */
    public function scopeInactivePost($query)
    {
        return $query->where('status', '=', -1);
    }


    public static function updatePost($id, $title, $status, $category, $mainImage, $data)
    {
        self::where('id', $id)->update([
            'title' => $title,
            'status' => $status,
            'category_id' => $category,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if ($mainImage !== null) {
            self::where('id', $id)->update(['main_image' => $_FILES['main_image']['name']]);
            $target_file =  public_path() . '\uploads\\' . basename($_FILES['main_image']['name']);
            self::uploadImage($target_file);
        }
        Meta::updateData($id, $data);
    }

    public function uploadImage($target_file){
        if (isset($_POST["submit"])) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file);
            }
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function editPost($id)
    {
        $post = self::where('id', $id)->with('meta')->firstOrFail();
        return $post;
    }

    /**
     * @effect: update post status from request
     *
     */
    public static function deletePost($id, $status)
    {
        self::where('id', $id)->update([
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public static function insert($title, $status, $category, $data)
    {
        $id = self::insertGetId([
            'title' => $title,
            'status' =>$status,
            'main_image' => $_FILES['main_image']['name'],
            'category_id' => $category
        ]);
        $target_dir = public_path() . '\uploads\\';
        $target_file = $target_dir . basename($_FILES['main_image']['name']);

        if (isset($_POST["submit"])) {
            if (!file_exists($target_file)) {
                self::uploadImage($target_file);
            }
        }
        Meta::updateData($id, $data);
    }

    public static function getPostWithStatus($status, $limit = 10)
    {
        return self::where('status', $status)->with('category', 'meta')->paginate($limit);
    }

    public static function countPosts(){
        return Posts::all()->count();
    }
}
