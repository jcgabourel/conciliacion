<?php

namespace App\Imports;

use App\Models\Banco;
use Maatwebsite\Excel\Concerns\ToModel;

class BancosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

  

    public function model(array $row)
    {
        return new Banco([
            
            'fecha'     => $row[1],
           'descripcion'    => $row[0], 
           'cargo'    => $row[2], 
           'abono'    => $row[3], 
           'saldo'    => $row[4], 
        ]);
    }
}
