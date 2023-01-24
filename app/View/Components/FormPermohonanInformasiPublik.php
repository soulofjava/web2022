<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormPermohonanInformasiPublik extends Component
{
    public $kelas;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($kelas)
    {
        $this->kelas = $kelas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-permohonan-informasi-publik');
    }
}
