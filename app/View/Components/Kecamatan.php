<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Kecamatan extends Component
{

    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $response = Http::withoutVerifying()->get('https://api.wonosobokab.go.id/api/camat');

        if (!$response->successful()) {
            return '<center><h1>Koneksi Gagal...</h1></center>';
        }

        $data = $response->json();

        $struktural = $data['struktural'];

        return view('components.kecamatan', compact('struktural'));
    }
}
