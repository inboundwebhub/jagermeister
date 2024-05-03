<?php

namespace App\Exports;

use App\Models\Prize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PrizesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prize::select("id", "prize_type", "prize_number","Assigned","Confirmed")->get();
    }

    public function headings(): array
    {
        return ["ID","prize type", "prize number","Assigned","Confirmed"];
    }
}
