<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;
?>

<html>
    <head>
      <link rel="stylesheet" type="text/css" href="{{url('css/StyleNaruci.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
  <body>

<form action="/Dodaj/store" method="post" class="uredi" enctype="multipart/form-data" >
 @csrf
     <div class="naslov">
     <h1 >Dodaj proizvod</h1>
     <a href="/home" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
      </div>
      <label for="ime"> Naziv jela:</label>
      <input type="text" class="form-control"  name="ime">
      <label for="cijena">Cijena proizvoda:</label><br>
      <input type="text" name="cijena" class="form-control" >
      <label for="opis"> Opis:</label><br>
      <input type="text" name="opis" id="opis" class="form-control"><br>
      <label for="img">Odaberi fotografiju:</label><br>
      <input class="slika" type="file" id="slika" name="slika" accept="image/*">
      <br>
      <br>
      <input type="submit" name="potvrdi" value="Potvrdi"  class="btn btn-success">
</form> 


    
     
      
   
</body>
</html>