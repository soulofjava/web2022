<?php

namespace App\View\Components;

use Closure;
use App\Models\Simpeg\Tb01;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;
use GuzzleHttp\Client;

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

        $client = new Client([
            'verify' => false // Mengabaikan verifikasi sertifikat SSL
        ]);

        try {
            $response = $client->get('https://api.wonosobokab.go.id/api/list-personil/' . $opdId);
            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $data = json_decode($response->getBody(), true);

                // Pastikan bahwa data yang diharapkan tersedia dalam respons
                if (isset($data['struktural']) && isset($data['non_struktural'])) {
                    $struktural = $data['struktural'];
                    $non_struktural = $data['non_struktural'];

                    return view('components.personil', compact('struktural', 'non_struktural'));
                } else {
                    return '<center><h1>Format respons tidak sesuai...</h1></center><br>';
                }
            } else {
                return '<center><h1>Koneksi Gagal...</h1></center><br>';
            }
        } catch (\Exception $e) {
            return '<center><h1>Koneksi Gagal: ' . $e->getMessage() . '</h1></center><br>';
        }

        // $opdId = env('ID_OPD'); // Mengambil nilai OPD_ID dari variabel lingkungan

        // $response = Http::withoutVerifying()->get('https://api.wonosobokab.go.id/api/list-personil/' . $opdId);

        // if (!$response->successful()) {
        //     return '<center><h1>Koneksi Gagal...</h1></center><br>' . $response->body();
        // }

        // $data = $response->json();

        // $struktural = $data['struktural'];

        // $non_struktural = $data['non_struktural'];

        // return view('components.personil', compact('struktural', 'non_struktural'));
    }
}
