<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;
 ?>

<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/StyleAppLogin.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{url('css/StyleNaruci.css')}}">
    </head>
  <body>
    <nav class="navbar">
      <div class="container">
                 <div >
                  <div id="main-menu">
                     <a href="/" class="natrag"><i class="fa-solid fa-arrow-left"></i></a>
                  </div>
      </div>
      </div>
  </nav>

<form action="/kosarica/store" method="get" class="uredikosarica" >
     <div class="naslov">
     <h1 >Naruči</h1>
      </div>
      <br>
      <div id="ID">
      <label for="ime" > Id:</label> <br>
      <input type="text" name="id" readonly="readonly" value="{{ $proizvod-> id}}" class="form-control">
      </div>
      <label for="ime"> Naziv proizvoda:</label> <br>
      <input type="text" name="ime" readonly="readonly" value="{{ $proizvod-> NazivJela}}" class="form-control">
      <label for="Cijena">Cijena proizvoda:</label><br>
      <input type="text" name="cijena" readonly="readonly" value="{{ $proizvod-> Cijena}}" class="form-control">
      <label for="kolicina"> Unesite količinu:</label><br>
      <input type="number" name="kolicina" id="kolicina" max="15" min="1" placeholder="Količina" value="1" class="form-control"><br>
      <input type="submit" name="potvrdi" value="Naruči" class="btn btn-success">
</form> 
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
        $("#ID").hide();
        });
</script>
 
      
   
</body>
</html>