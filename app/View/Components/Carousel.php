<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Carousel extends Component
{
    public $jjj;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($jjj)
    {
        $this->jjj = $jjj;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
