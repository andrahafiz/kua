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
        $this->job = [
            'BELUM /TIDAK BEKERJA',
            'KARYAWAN SWASTA',
            'PELAJAR/MAHASISWA',
            'PNS',
            'TENTARA NASIONAL INDONESIA',
            'WIRASWASTA',
            'PETANI/PEKEBUN',
            'MENGURUS RUMAH TANGGA',
            'PEKERJAAN LAINNYA',
            'DOSEN',
            'PILOT',
            'NOTARIS',
            'PENGACARA',
            'ARSITEK',
            'AKUNTAN',
            'DOKTER',
            'KARYAWAN BUMN',
            'GURU',
            'PERDAGANGAN',
            'SOPIR',
            'PERANGKAT DESA',
            'NELAYAN/PERIKANAN',
            'PETERNAK',
            'KARYAWAN BUMD',
            'KARYAWAN HONORER',
            'BURUH HARIAN LEPAS',
            'BURUH TANI/PERKEBUNAN',
            'BURUH NELAYAN/PERIKANAN',
            'BURUH PETERNAKAN',
            'PEMBANTU RUMAH TANGGA',
            'KEPOLISIAN RI',
            'PENSIUNAN',
        ];
    }

    public function render()
    {
        return view('components.job');
    }
}
