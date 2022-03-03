<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File ;
use App\Models\Banco;
use App\Models\CargaBanco;
use App\Models\CargaBancoDetalle;


use App\Imports\BancosImport;
use App\Imports\CargaBancosDetalleImport;
use Maatwebsite\Excel\Facades\Excel;

class BancoController extends Controller
{
    //
    public function index()
    {
        $data['bancos'] = Banco::orderBy('fecha','asc')->paginate(5);
        return view('bancos.index',$data);
    }

    public function carga(Request $request)
    {
      $path =  $request->file('bancoFile')->store('bancoFiles');
      //File::get(storage_path('app/'.$path));    
       
     
       $cargaBanco = new CargaBanco ;
       $cargaBanco->nombreArchivo= storage_path('app/'.$path) ;
       $cargaBanco->fechaCarga=date("Y-m-d") ;
       $f=$cargaBanco->numRegistros=0 ;
       $cargaBanco->save();

      $cargaBancoDetalleImport =    new CargaBancosDetalleImport ;
      $cargaBancoDetalleImport->fkey  =$cargaBanco->id;

      Excel::import( $cargaBancoDetalleImport, storage_path('app/'.$path));

      //Excel::import(new BancosImport, storage_path('app/'.$path));
        
      return redirect('/cargaBancos')->with('success', 'All good!');
    }

public function store(Request $request)
{
        $request->validate([
        'reg1Fecha' => 'required',
        'reg1Desc' => 'required',
        'reg1Cargo' => 'required',
        'reg1Abono' => 'required',
        'reg1Saldo' => 'required'
        ]);

        $banco = new Banco;
        $banco->fecha = $request->reg1Fecha;
        $banco->descripcion = $request->reg1Desc;
        $banco->cargo = $request->reg1Cargo;
        $banco->abono = $request->reg1Abono;
        $banco->saldo = $request->reg1Saldo;

        $banco->save();

        return redirect()->route('bancos.index')
        ->with('success','Company has been created successfully.');
}
    
}
