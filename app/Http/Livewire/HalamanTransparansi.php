<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\News;
use Livewire\Component;

class HalamanTransparansi extends Component
{
    public $kategorine, $kategoriTerpilih = null, $datane = null, $tahun, $tahunTerpilih = null;

    public function mount()
    {
        $this->kategorine = Kategori::with('groupe')
            ->whereHas('groupe', function ($query) {
                $query->where('code_nm', 'transparansi');
            })
            ->orderBy('name', 'ASC')
            ->pluck('name');
    }

    public function ubahTahun($t)
    {
        $this->tahunTerpilih = $t;

        $this->datane = News::whereIn('tag', [$this->kategoriTerpilih]) // Changed to use selected category
            ->whereNotNull('tag')
            ->where('terbit', 1)
            ->when($this->tahunTerpilih, function ($query) {
                $query->whereYear('date', $this->tahunTerpilih);
            })
            ->latest('date')
            ->get();
    }

    public function ubahPilih($kat)
    {
        $this->kategoriTerpilih = $kat;
        $this->tahunTerpilih = null;

        $this->datane = News::whereIn('tag', [$this->kategoriTerpilih]) // Changed to use selected category
            ->whereNotNull('tag')
            ->where('terbit', 1)
            ->latest('date')
            ->get();

        $this->tahun = $this->datane->pluck('date')->sortBy(function ($date) {
            return strtotime($date);
        })->map(function ($item) {
            return date('Y', strtotime($item));
        })->unique();
    }

    public function render()
    {
        return view('livewire.halaman-transparansi', [
            'kategorine' => $this->kategorine,
            'datane' => $this->datane
        ]);
    }
}
