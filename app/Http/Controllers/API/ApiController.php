<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FrontMenu;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

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

    public function galleries()
    {
        return response()->json(Gallery::all(), 200);
    }
}
