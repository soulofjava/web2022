<?php

namespace App\View\Components;

use Closure;
use App\Models\Simpeg\Tb01;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class Personil extends Component
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
        $opdId = env('ID_OPD'); // Mengambil nilai OPD_ID dari variabel lingkungan

        $response = Http::withoutVerifying()->get('https://api.wonosobokab.go.id/api/list-personil/' . $opdId);

        if (!$response->successful()) {
            return '<center><h1>Koneksi Gagal...</h1></center><br>' . $response->json();
        }

        $data = $response->json();

        $struktural = $data['struktural'];

        $non_struktural = $data['non_struktural'];

        return view('components.personil', compact('struktural', 'non_struktural'));
    }
}
