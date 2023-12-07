<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Komponen extends Component
{
    public $li;
    public $a;
    public $ul;
    public $i;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($li = '', $a = '', $ul = '', $i = '')
    {
        $this->li = $li;
        $this->a = $a;
        $this->ul = $ul;
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.komponen');
    }
}
