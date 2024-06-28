<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Religion extends Component
{
    public $selected;
    public $status;

    public function __construct($selected = null, $status = 0)
    {
        $this->selected = $selected;
        $this->status = $status;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $religion = ['Islam', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Katolik', 'Konghucu'];
        return view('components.religion', compact('religion'));
    }
}
