<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargaBanco;
 

class cargaBancosController extends Controller
{
    //
    public function index(CargaBanco $carga )
    {
        dd($carga->fechaCarga);
       
        $data['cargas'] = CargaBanco::all() ;

         
        return view('bancos.cargaBancoIndex',$data);
    }

}
