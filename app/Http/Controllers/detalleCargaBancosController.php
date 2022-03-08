<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargaBancosDetalle;

class detalleCargaBancosController extends Controller
{
    //
    function index($id)
    {
        $detalles = CargaBancosDetalle::find($id) ; // ->orderBy('id')->paginate(5);

        dd($detalles);
        return view('bancos.index',$data);
    }

}
