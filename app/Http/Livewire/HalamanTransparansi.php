<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\News;
use Livewire\Component;

class HalamanTransparansi extends Component
{
    public $kategorine, $kategoriTerpilih = null, $datane = null;

    public function mount()
    {
        $this->kategorine = Kategori::with('groupe')
            ->whereHas('groupe', function ($query) {
                $query->where('code_nm', 'transparansi');
            })
            ->orderBy('name', 'ASC')
            ->pluck('name');
    }

    public function ubahPilih($kat)
    {
        $this->kategoriTerpilih = $kat;
        $this->datane = News::whereIn('tag', [$this->kategoriTerpilih]) // Changed to use selected category
            ->whereNotNull('tag')
            ->where('terbit', 1)
            ->latest('date')
            ->get();
    }

    public function render()
    {
        return view('livewire.halaman-transparansi', [
            'kategorine' => $this->kategorine,
            'datane' => $this->datane
        ]);
    }
}
