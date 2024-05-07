<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Kecamatan extends Component
{
    protected $struktural;

    public function __construct()
    {
        $response = Http::withoutVerifying()->get('https://api.wonosobokab.go.id/api/camat');

        if (!$response->successful()) {
            $this->struktural = '<center><h1>Koneksi Gagal...</h1></center>';
        } else {
            $data = $response->json();
            $this->struktural = $data['struktural'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kecamatan', ['struktural' => $this->struktural]);
    }
}
