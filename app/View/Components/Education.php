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
        $this->education = [
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
        return view('components.education');
    }
}
