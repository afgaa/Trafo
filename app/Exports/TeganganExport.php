<?php

namespace App\Exports;

use App\Models\Tegangan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeganganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tegangan::all();
    }
}
