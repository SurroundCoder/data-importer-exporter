<?php

namespace App\Imports;

use App\Models\EndUser;
use Maatwebsite\Excel\Concerns\ToModel;

class EndUserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EndUser([
            'username'      => $row[1],
            'password'      => '',
            'full_name'     => $row[2],
            'phone'         => $row[3],
            'email'         => $row[4],
            'is_deleted'    => @$row[5] ?? 0,
            'created_at'    => time(),
        ]);
    }
}
