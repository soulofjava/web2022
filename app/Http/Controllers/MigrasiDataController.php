<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Corcel\Model\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MigrasiDataController extends Controller
{
    public function index()
    {
        // all post
        $posts = Post::whereNot('post_title', '')->get();
        return response()->json($posts, 200);
    }

    public function post_id()
    {
        // post by id
        $posts = Post::find(2641);
        return response()->json($posts, 200);
    }

    public function insert()
    {
        set_time_limit(0);

        // insert into database laravel
        $posts = Post::where('post_title', '!=', '')->where('post_content', '!=', '')->published()->get();

        foreach ($posts as $key) {
            $data = ([
                'title' => $key->post_title,
                'slug' => SlugService::createSlug(News::class, 'slug', $key->post_title),
                'date' => $key->post_date,
                'upload_by' => 2,
                'attachment' => $key->thumbnail->attachment->url ?? null,
                'description' => $key->post_content,
            ]);
            News::create($data);
        }

        return response()->json('Selesai!', 200);
    }

    public function clean()
    {
        // hapus postingan tanpa judul
        $posts = News::where('title', 'NULL')->get();
        // foreach ($posts as $key) {
        //     $data = News::find($key->id);
        //     $data->delete();
        // }
        // return response()->json('data News sudah dibersihkan', 200);
        return response()->json($posts, 200);
    }
}
