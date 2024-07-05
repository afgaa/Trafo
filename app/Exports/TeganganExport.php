<?php

namespace App\Exports;

use App\Models\Tegangan;
use App\Models\TeganganHistory;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeganganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = TeganganHistory::select('id','trafo_name','topic_name_r','topic_name_s','topic_name_t','value_r','value_s','value_t','created_at')->get();

        // dd($data);
        return $data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Trafo Name',
            'Topic Name R',
            'Topic Name S',
            'Topic Name T',
            'Value R',
            'Value S',
            'Value T',
            'Created At'
        ];
    }
}
