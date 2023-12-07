<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavbarMenu extends Component
{
    public $li;
    public $a;
    public $ul;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($li = '', $a = '', $ul = '')
    {
        $this->li = $li;
        $this->a = $a;
        $this->ul = $ul;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-menu');
    }
}
