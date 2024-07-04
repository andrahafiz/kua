<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HubunganWali extends Component
{
    public $name;
    public $selected;
    public $status;
    public $hubungawali;

    public function __construct($name, $selected = null, $status = 0)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->status = $status;
        $this->hubungawali = [
            'TIDAK/BELUM SEKOLAH',
            'TIDAK TAMAT SD/SEDERAJATNYA',
            'TAMAT SD/SEDERAJATNYA',
            'SLTP/SEDERAJATNYA',
            'SLTA/SEDERAJATNYA',
            'DIPLOMA I/II',
            'AKADEMI/DIPLOMA III/S.MUDA',
            'DIPLOMA IV/STRATA I',
            'STRATA II',
            'STRATA III',
        ];
    }

    public function render()
    {
        return view('components.hubunganwali');
    }
}
