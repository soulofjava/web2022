<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Category extends Component
{
    public $h3;
    public $div;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($h3 = '', $div = '')
    {
        $this->h3 = $h3;
        $this->div = $div;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category');
    }
}
