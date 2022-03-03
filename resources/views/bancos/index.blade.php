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
                <div class="card-body">
                    <select class="form-select" aria-label="Default select example">
                    <option selected>AÑO</option>
                    <option value="1">2021</option>
                    <option value="2">2019</option>
                    <option value="3">2018</option>
                    </select>

                    <select class="form-select" aria-label="Default select example">
                    <option selected>MES</option>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    </select>


<br />
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  cargar txt
</button>
                     
<button type="button" class="btn btn-secondary">borrar</button>
<button type="button" class="btn btn-success">configurar</button>
 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCreate">agregar</button> 

<br />

                    <table class="table" >
  <thead>
    <tr>
      
      <th scope="col">Fecha</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Cargo</th>
      <th scope="col">Abono</th>
      <th scope="col">Saldo</th>


    </tr>
  </thead>
  <tbody>

  

  @foreach ($bancos as $banco)
  <tr>
       
      <td>{{$banco->fecha}}</td>
      <td>{{$banco->descripcion}}</td>
      <td>{{$banco->cargo}}</td>
      <td>{{$banco->abono}}</td>
      <td>{{$banco->saldo}}</td>
    </tr>
@endforeach

    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>   




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
<!-- Modal create -->
<form action ="{{route('guardaRegistroBancos')}}" method="post"  >
@csrf
<div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalCreateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar movimiento </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="reg1Fecha" class="form-label">Fecha movimiento</label>
          <input type="date" class="form-control" id="reg1Fecha" name="reg1Fecha" placeholder="dd/mm/YYYY " required>
        </div>
        <div class="mb-3">
          <label for="reg1Desc" class="form-label">Descripcion</label>
          <input type="text" class="form-control" id="reg1Desc"  name="reg1Desc"placeholder="Descripcion " required>
        </div>

        <label for="reg1Cargo" class="form-label">Cargo</label>
        <div class="input-group mb-3">
          
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="reg1Cargo" name="reg1Cargo" placeholder="0 " required>
        </div>
        <label for="reg1Abono" class="form-label">Abono</label>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>  
          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="reg1Abono"  name="reg1Abono" placeholder="0 " required>
        </div>
        <label for="reg1Saldo" class="form-label">Saldo</label>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>  
          <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="reg1Saldo "  name="reg1Saldo" placeholder="0 " required>
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




                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html> 