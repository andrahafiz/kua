<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Religion extends Component
{
    public $name;
    public $selected;
    public $status;
    public $religion;

    public function __construct($name, $selected = null, $status = 0)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->status = $status;
        $this->religion = ['Islam', 'Kristen'];
    }

    public function render()
    {
        return view('components.religion');
    }
}
