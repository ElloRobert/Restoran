<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;
?>

<html>
    <head>
      <link rel="stylesheet" type="text/css" href="{{url('css/StyleNaruci.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body>
   

<form action="/home/UrediProizvod" method="post" class="uredi" enctype="multipart/form-data" >
  @csrf
     <div class="naslov">
     <h1 >Uredi proizvod:</h1>
     <a href="/home" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
      </div>
      <label for="id">ID:</label><br>
      <input type="text" name="id" readonly  value="{{ $proizvod-> id}}">
      <label for="ime"> Naziv proizvoda:</label>
      <input type="text" name="ime"  value="{{ $proizvod-> NazivJela}}">
      <label for="Cijena">Cijena proizvoda:</label><br>
      <input type="text" name="cijena"  value="{{ $proizvod-> Cijena}}">
      <label for="opis"> Opis:</label><br>
      <input type="text" name="opis" id="opis" value="{{$proizvod-> Opis}}"><br>
      <label for="img">Odaberi drugu fotografiju:</label>
      <input class="slika" type="file" id="slika" name="slika" accept="image/*">
      <br>
      <br>
      <input type="submit" name="potvrdi" value="Potvrdi" class="button-confirm">
</form> 

    
     
      
   
</body>
</html>