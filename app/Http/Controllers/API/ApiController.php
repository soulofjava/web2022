<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FrontMenu;
use App\Models\News;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function personil()
    {
        return view('api.listperson');
    }
    
    public function menu()
    {
        return response()->json(FrontMenu::all(), 200);
    }

    public function news()
    {
        return response()->json(News::all(), 200);
    }
}
