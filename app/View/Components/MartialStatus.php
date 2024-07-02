<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MartialStatus extends Component
{
    public $name;
    public $selected;
    public $status;
    public $martial_status;

    public function __construct($name, $selected = null, $status = 0)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->status = $status;
        $this->martial_status = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
    }

    public function render()
    {
        return view('components.martial-status');
    }
}
