<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MartialStatus extends Component
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
        $maritalStatuses = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        return view('components.martial-status', compact('maritalStatuses'));
    }
}
