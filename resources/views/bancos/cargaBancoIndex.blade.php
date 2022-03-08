<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">

  <div class="card">
    <div class="card-header ">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          cargar txt
        </button>
      </div>
    </div>
    <div class="card-body">
    <table class="table" >
    <thead>
      <tr>
        
        <th scope="col">Fecha</th>
        <th scope="col">Nombre Archivo</th>
        <th scope="col">Registros</th>
        <th scope="col">Acciones</th>
        


      </tr>
    </thead>
    <tbody>

    

    @foreach ($cargas as $carga)
    <tr>
        
        <td>{{$carga->fechaCarga}}</td>
        <td>{{$carga->nombreArchivo}}</td>
        <th scope="col">0</th>
        <th scope="col"> 
          <form action="{{ route('eliminaCargaBancos' , $carga->id )  }}"  style="display:inline" method="POST" > 
          @csrf 
           @method('DELETE') 
             <button type="submit" class="btn btn-outline-danger">  Eliminar </button>
          </form>

        <a href="{{route('detalleBancos',$carga->id)}}"> <button type="button" class="btn btn-outline-info">Detalles</button></a>
      
      </th>
      </tr>
    @endforeach

      
    </tbody>
  </table>  
    </div>
  </div>

   


</div>    


<!-- Modal -->
<form action ="{{route('cargabancos')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargar TXT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3"> Selecciones el archivo csv correspondiente al mes de.... <br />
                        para descargar el layout hacer click aqui <a href='#'><span class="material-icons">text_snippet</span></a>
                        <br />        <br />        <br />
  <label for="formFile" class="form-label">Cargar archivo excel</label>
  <input class="form-control" type="file" id="formFile" name="bancoFile" accept=".xlsx">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary"   >Save changes</button> 
      </div>
    </div>
  </div>
</div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


 