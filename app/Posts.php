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
    public static function insertGetId($array)
    {
        $id = DB::table('posts')->insertGetId($array);
        return $id;
    }

    /**
     * @return Factory|View
     */
    public static function posts(){
        $data = self::where('status', '=', 1)->paginate(15);

        return $data;
    }

    /**
     * @return mixed
     */
    public function inactivePost(){
        $posts = Posts::where('status', '=', -1)->paginate(15);
        return $posts;
    }


    public static function updatePost($id){
        self::where('id', $id)->update([
            'title' => request()->title,
            'status' => request()->status,
            'category_id' => request()->category,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if (request()->main_image !== null) {
            self::where('id', $id)->update(['main_image' => $_FILES['main_image']['name']]);
            $target_dir = public_path() . '\uploads\\';
            $target_file = $target_dir . basename($_FILES['main_image']['name']);
            if (isset($_POST["submit"])) {
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file);
                }
            }
        }
        Meta::where('post_id', $id)->update([
            'data' => request()->content_text
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function edit($id){
        $post = self::where('id',$id)->with('meta')->first();
        return $post;
    }

    /**
     * @effect: update post status from request
     * @return bool|RedirectResponse|Redirector|null
     */
    public static function deletePost()
    {
        $id = request()->post('id', '');
        $status = request()->post('status', '');
        self::where('id', $id)->update([
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('posts');
    }

    public static function insert(){

        $id = self::insertGetId([
            'title' => request()->title,
            'status' => request()->status,
            'main_image' => $_FILES['main_image']['name'],
            'category_id' => request()->category
        ]);
        $target_dir = public_path() . '\uploads\\';
        $target_file = $target_dir . basename($_FILES['main_image']['name']);

        if (isset($_POST["submit"])) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file);
            }
        }

        $meta = new Meta();
        $meta->data = request()->content_text;
        $meta->post_id = $id;
        $meta->save();
    }
}
