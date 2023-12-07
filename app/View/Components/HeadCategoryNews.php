<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeadCategoryNews extends Component
{
    public $bc;
    public $tc;
    public $btn;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bc = '', $tc = '', $btn = 'btn')
    {
        $this->bc = $bc;
        $this->tc = $tc;
        $this->btn = $btn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.head-category-news');
    }
}
