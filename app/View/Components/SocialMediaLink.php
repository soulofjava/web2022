<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialMediaLink extends Component
{
    public $fb;
    public $twitter;
    public $insta;
    public $youtube;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fb, $twitter, $insta, $youtube)
    {
        $this->fb = $fb;
        $this->twitter = $twitter;
        $this->insta = $insta;
        $this->youtube = $youtube;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social-media-link');
    }
}
