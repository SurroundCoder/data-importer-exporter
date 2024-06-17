<?php

namespace App\Exports;

use App\Models\EndUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class EndUserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EndUser::all();
    }
}
