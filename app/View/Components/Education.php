<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Education extends Component
{
    public $name;
    public $selected;
    public $status;
    public $education;

    public function __construct($name, $selected = null, $status = 0)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->status = $status;
        $this->education = ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'];
    }

    public function render()
    {
        return view('components.education');
    }
}
