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
        // insert into database laravel
        $posts = Post::whereNot('post_title', '')->published()->get();

        foreach ($posts as $key) {

            $data = ([
                // 'title' => $jk,
                'title' => $key->post_title,
                'slug' => SlugService::createSlug(News::class, 'slug', $key->post_title),
                'date' => $key->post_date,
                'upload_by' => 'admin',
                'description' => $key->post_content,
            ]);

            if (strtolower($key->main_category) == 'sambutan') {
                $kate = 'KATEGORI_NEWS_0';
            } elseif (strtolower($key->main_category) == 'dokumentasi') {
                $kate = 'KATEGORI_NEWS_1';
            } elseif (strtolower($key->main_category) == 'press release') {
                $kate = 'KATEGORI_NEWS_2';
            } elseif (strtolower($key->main_category) == 'notulensi') {
                $kate = 'KATEGORI_NEWS_3';
            } else {
                $kate = $key->main_category;
            }

            News::create($data + ['kategori' => $kate]);
        }

        return response()->json('selesai salin data ke database baru', 200);
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
