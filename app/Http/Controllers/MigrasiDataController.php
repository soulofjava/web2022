<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Corcel\Model\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MigrasiDataController extends Controller
{
    public function index()
    {
        $searchTerm = 'Rentang Waktu Pendaftaran Seleksi PPPK Guru';

        $results = collect([]);

        // Mendapatkan daftar tabel dalam database
        $tables = DB::connection('joomla')->select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            // Mendapatkan daftar kolom dalam tabel
            $columns = DB::connection('joomla')->getSchemaBuilder()->getColumnListing($tableName);

            // Membuat kueri untuk mencari data
            $query = DB::connection('joomla')->table($tableName);

            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $searchTerm . '%');
            }

            // Menambahkan hasil pencarian ke dalam koleksi
            $tableResults = $query->get();
            if ($tableResults->count() > 0) {
                $results->push([
                    'table' => $tableName,
                    'results' => $tableResults
                ]);
            }
        }

        // Output hasil pencarian
        return response()->json($results, 200);
    }

    public function insert()
    {
        set_time_limit(0);

        // insert into database laravel
        $posts = Post::published()->get();

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
}
