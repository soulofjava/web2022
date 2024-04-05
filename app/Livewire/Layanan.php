<?php

namespace App\Livewire;

use App\Models\PinjamTempat;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use App\Mail\PinjamTempatMail;

class Layanan extends Component
{
    use WithFileUploads;

    public $showDiv = false;

    #[Validate('required|min:3|alpha')]
    public $nama;

    #[Validate('required')]
    public $jkel;

    #[Validate('required|max:2')]
    public $usia;

    #[Validate('required')]
    public $pekerjaan;

    #[Validate('required')]
    public $pendidikan;

    #[Validate('required')]
    public $instansi;

    #[Validate('required')]
    public $tanggal;

    #[Validate('required')]
    public $waktu;

    #[Validate('required')]
    public $kegiatan;

    #[Validate('required|min:5')]
    public $acara;

    #[Validate('required|max:2')]
    public $jumlah;

    #[Validate('required')]
    public $kontak;

    #[Validate('required')]
    public $email;

    #[Validate('required|mimes:pdf|max:2048')]
    public $surat;

    public function toggleDiv()
    {
        $this->showDiv = !$this->showDiv;
        $this->reset(['nama', 'jkel', 'usia', 'pekerjaan', 'pendidikan', 'instansi', 'tanggal', 'waktu', 'kegiatan', 'acara', 'jumlah', 'kontak', 'surat']);
    }

    function simpan()
    {
        $data = $this->validate();
        $nama_file = $this->surat->getClientOriginalName();
        $path = $this->surat->storeAs('surat', $nama_file, 'gcs');
        $data['surat'] = $path;

        PinjamTempat::create($data);

        // kirim email 
        Mail::to(env('MAIL_USERNAME'))->send(new PinjamTempatMail([
            'nama' => $this->nama,
            'jkel' => $this->jkel,
            'usia' => $this->usia,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan' => $this->pendidikan,
            'instansi' => $this->instansi,
            'tanggal' => $this->tanggal,
            'waktu' => $this->waktu,
            'kegiatan' => $this->kegiatan,
            'acara' => $this->acara,
            'jumlah' => $this->jumlah,
            'kontak' => $this->kontak,
        ]));
        

        $this->toggleDiv();
    }

    public function render()
    {
        return view('livewire.layanan', [
            'rapat' => PinjamTempat::latest('tanggal')->get()
        ]);
    }
}
