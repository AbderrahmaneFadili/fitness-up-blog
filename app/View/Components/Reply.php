<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Reply extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $reply;

    public function __construct($reply)
    {
        //
        $this->reply = $reply;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reply');
    }
}
