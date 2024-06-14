<?php

namespace App\Exports;

use App\Models\Suhu;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuhuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Suhu::all();
    }
}
