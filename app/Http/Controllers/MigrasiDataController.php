<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class MigrasiDataController extends Controller
{
    public function index()
    {
        $a = News::where('id', 591)->first();
        return $a->content;
        $searchTerm = 'Hasil SKD Seleksi CPNS 2018';
        // $searchTerm = 'image';

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

        $this->insert();
        $this->insert2();
        // Output hasil pencarian
        return response()->json($results, 200);
        // return response()->json('selesai', 200);
    }

    public function insert()
    {
        News::truncate();

        set_time_limit(0);
        // Mendapatkan daftar tabel dalam database
        $posts = DB::connection('joomla')->table('runpack_k2_items')->where('id', '>', 34)->get();

        foreach ($posts as $key) {
            $data = ([
                'title' => $key->title,
                'slug' => $key->alias,
                'content' => $key->introtext,
                'terbit' => $key->published,
                'date' => $key->created,
                'upload_by' => 2,
            ]);
            News::create($data);
        }

        // return response()->json('Selesai!', 200);
    }

    public function insert2()
    {
        set_time_limit(0);
        // Mendapatkan daftar tabel dalam database
        $posts = DB::connection('joomla2')->table('ppid_k2_items')->where('id', '>', 33)->get();

        foreach ($posts as $key) {
            $data = ([
                'title' => $key->title,
                'slug' => $key->alias,
                'content' => $key->introtext,
                'terbit' => $key->published,
                'date' => $key->created,
                'upload_by' => 2,
            ]);
            News::create($data);
        }

        // return response()->json('Selesai!', 200);
    }
}
