<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\ProizvodiController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('css/StylePonuda.css')}}">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <title>Ponuda</title>
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
<div class="section1" id="section1" id="grid-container">
    <div class="naslov">
        <h1>Naša ponuda</h1>
    </div>
    <div class="container">
        <div class="row">
    @if(count($proizvodis)>0)
    @foreach ($proizvodis as $proizvod)
    <div class="col-3">
        <div class="card" style="width: 15vw;">
          <img src="../storage/uploads/{{ $proizvod ->Slika}}" alt='{{ $proizvod ->Slika}}' alt='Pohana Piletina' class="card-img-top">
          <div class="card-body">
           <h5 class="card-title">{{$proizvod-> NazivJela}}</h5>
           <p class='price'>{{$proizvod->Cijena}}kn</p>
           <p class="card-text">{{$proizvod->Opis}}</p>
           <a href='Naruci?ID={{ $proizvod-> id}}' class="btn btn-dark">Naruči odmah</a>
         </div>
      </div>
      </div>
    @endforeach
    </div>
        </div>
    @else 
     <p> Nema proizvoda</p>
    @endif
</div>
</body>
</html>
