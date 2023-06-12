<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userform extends Component
{
    /**
     * Create a new component instance.
     * 
     * 
     * @return void
     */
    public $type;
    public $name;
    public $id;
    public $placeholder;

    public function __construct($type = null, $name = null, $id = null, $placeholder = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userform');
    }
}
