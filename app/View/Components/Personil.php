<?php

namespace App\View\Components;

use Closure;
use App\Models\Simpeg\Tb01;
use GuzzleHttp\Client;
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
        $opdId = env('ID_OPD');

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.wonosobokab.go.id/api/list-personil/' . $opdId, [
                'verify' => false, // Menonaktifkan verifikasi SSL
            ]);

            if ($response->getStatusCode() != 200) {
                return '<center><h1>Koneksi Gagal...</h1></center>';
            }

            $data = json_decode($response->getBody(), true);

            $struktural = $data['struktural'];
            $non_struktural = $data['non_struktural'];

            return view('components.personil', compact('struktural', 'non_struktural'));
        } catch (Exception $e) {
            return '<center><h1>Error: ' . $e->getMessage() . '</h1></center>';
        }
    }
}
