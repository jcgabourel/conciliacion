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

  

  @foreach ($cargas as $banco)
  <tr>
       
      <td>{{$banco->fecha}}</td>
      <td>{{$banco->descripcion}}</td>
      <td>{{$banco->cargo}}</td>
      <td>{{$banco->abono}}</td>
      <td>{{$banco->saldo}}</td>
    </tr>
@endforeach

     
  </tbody>
</table>   
</div>    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>