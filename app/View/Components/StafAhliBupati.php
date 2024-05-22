<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class StafAhliBupati extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $response = Http::withoutVerifying()->get(config('app.iplocal') . '/stafahli');

        if (!$response->successful()) {
            return '<center><h1>Koneksi Gagal...</h1></center>';
        }

        $data = $response->json();

        $struktural = $data['struktural'];
        // dd($struktural);

        return view('components.staf-ahli-bupati', compact('struktural'));
    }
}
