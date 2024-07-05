<?php

namespace App\Exports;

use App\Models\ArusHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ArusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ArusHistory::select('id','trafo_name','topic_name_r','topic_name_s','topic_name_t','value_r','value_s','value_t','created_at')->get();

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
