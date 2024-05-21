<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\News;
use Livewire\Component;

class HalamanLayanan extends Component
{
    public $kategorine, $kategoriTerpilih = null, $datane = null;

    public function mount()
    {
        $this->kategorine = Kategori::with('groupe')
            ->whereHas('groupe', function ($query) {
                $query->where('code_nm', 'layanan');
            })
            ->orderBy('name', 'ASC')
            ->pluck('name');
    }

    public function ubahPilih($kat)
    {
        $this->kategoriTerpilih = $kat;
        $this->datane = News::whereIn('tag', [$this->kategoriTerpilih])->whereNotNull('tag')->where(
            'terbit',
            1
        )->latest('date')->get();
    }

    public function render()
    {
        return view('livewire.halaman-layanan', [
            'kategorine' => $this->kategorine,
            'datane' => $this->datane
        ]);
    }
}
