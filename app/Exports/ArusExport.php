<?php

namespace App\Exports;

use App\Models\Arus;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArusExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Arus::all();
    }
}
