<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusPembayaran extends Component
{
    public $status;

    public function __construct($status = 'blue')
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-pembayaran');
    }
}
