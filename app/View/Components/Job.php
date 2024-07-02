<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Job extends Component
{
    public $name;
    public $selected;
    public $status;
    public $job;

    public function __construct($name, $selected = null, $status = 0)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->status = $status;
        $this->job = ['BELUM BEKERJA', 'PEGAWA', 'LAINNYA'];
    }

    public function render()
    {
        return view('components.job');
    }
}
