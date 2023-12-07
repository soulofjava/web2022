<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LoopingImage extends Component
{
    public $foto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($foto)
    {
        $this->foto = $foto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.looping-image');
    }
}
