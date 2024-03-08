<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FrontMenu;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ApiController extends Controller
{
    public function menu()
    {
        return response()->json(FrontMenu::all(), 200);
    }

    public function news()
    {
        return response()->json(News::all(), 200);
    }

    public function cari(Request $request)
    {
        // Assume you're passing a query parameter named 'status'
        $status = $request->query('cari');

        // If 'status' parameter is provided, filter users by status
        if ($status) {
            $data = News::select('id', 'title', 'slug')->where('title', 'like', '%' . $status . '%')->get();
            // Add a new column containing the Laravel route based on the fetched data
            $data->transform(function ($item) {
                $item['slug'] = URL::route('news.detail', ['slug' => $item['slug']]);
                return $item;
            });

            $data2 = FrontMenu::select('id', 'menu_url', 'kategori', DB::raw('menu_name as title'))->where('menu_name', 'like', '%' . $status . '%')->get();
            $data2->transform(function ($item2) {
                $item2['menu_url'] = URL::route('page', ['id' => $item2['menu_url']]);
                return $item2;
            });

            $users = $data->concat($data2);
        } else {
            // If 'status' parameter is not provided, fetch all users
            $users = News::all();
        }

        return response()->json($users);
    }

    public function galleries()
    {
        return response()->json(Gallery::all(), 200);
    }
}
