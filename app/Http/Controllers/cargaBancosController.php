<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargaBanco;
 
use App\Imports\BancosImport;
use App\Imports\CargaBancosDetalleImport;
use Maatwebsite\Excel\Facades\Excel;

class cargaBancosController extends Controller
{
    //
    public function index()
    {
        
        $cargas = CargaBanco::all() ;  
      
        return view('bancos.cargaBancoIndex',compact('cargas'));
    }

    public function delete($id )
    {

        
        $carga = CargaBanco::find($id ); 
        $carga->delete();

        return redirect ('/cargaBancos');

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

}
