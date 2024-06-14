<?php

namespace App\Exports;

use App\Models\Tekanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TekananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tekanan::all();
    }
}
