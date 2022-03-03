<?php

namespace App\Imports;

use App\Models\CargaBancosDetalle;
use Maatwebsite\Excel\Concerns\ToModel;

class CargaBancosDetalleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $fkey ;

    public function model(array $row)
    {
        return new CargaBancosDetalle([
            'carga_bancos_id'=> $this->fkey,
            'fecha'     => $row[1],
           'descripcion'    => $row[0], 
           'cargo'    => is_null($row[2])? 0: $row[2]  , 
           'abono'    => $row[3], 
           'saldo'    => $row[4], 
        ]);
    }
}
