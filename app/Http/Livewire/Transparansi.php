<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use Livewire\Component;

class Transparansi extends Component
{
    public function render()
    {
        return view('livewire.transparansi', [
            'kategoriNames' => Kategori::with('groupe')
                ->whereHas('groupe', function ($query) {
                    $query->where('code_nm', 'transparansi');
                })
                ->orderBy('name', 'ASC')
                ->pluck('name')
        ]);
    }
}
