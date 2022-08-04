<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;
?>

<html>
    <head>
      <link href="{{ asset('css/StyleAppLogin.css') }}" rel="stylesheet">
      <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body>
   
    <nav class="navbar">
      <div class="container">
          <div >

                  <div id="main-menu">
                  
                     <a href="/home" class="natrag"><i class="fa-solid fa-arrow-left"></i></a>
                  </div>
                   </div>
                  </div>
              </nav>

<form action="/home/UrediProizvod" method="post" class="uredi" enctype="multipart/form-data" >
  @csrf
     <div class="naslov">
     <h2>Uredi proizvod:</h2>
      </div>
      <br>
      <br>
      <label for="id">ID:</label><br>
      <input type="text" class=" input" name="id" readonly  value="{{ $proizvod-> id}}"><br>
      <label for="ime"> Naziv proizvoda:</label><br>
      <input type="text" class="form-control" name="ime"  value="{{ $proizvod-> NazivJela}}">
      <label for="Cijena">Cijena proizvoda:</label><br>
      <input type="text" class="form-control input" name="cijena"  value="{{ $proizvod-> Cijena}}">
      <label for="opis"> Opis:</label><br>
      <input type="text" class="form-control input" name="opis" id="opis" value="{{$proizvod-> Opis}}">
      <label for="img">Odaberi drugu fotografiju:</label><br>
      <input class="slika" class="form-control input" type="file" id="slika" name="slika" accept="image/*">
    
      <br>
      <input type="submit" name="potvrdi" value="Potvrdi" class="btn btn-success">
</form>   
</body>
</html>