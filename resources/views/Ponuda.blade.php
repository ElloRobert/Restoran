<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\ProizvodiController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{url('css/StylePonuda.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ponuda</title>
</head>
<body>
<div class="section1" id="section1">

    <h1 style="text-align:center;">Naša ponuda</h1>
    <a href="/"><i class="fa fa-long-arrow-left" style="font-size:36px"></i></a>
    <br>
    @if(count($proizvodis)>0)
    @foreach ($proizvodis as $proizvod)
    <div class='card'>
      <img src="../storage/uploads/{{ $proizvod ->Slika}}" alt='{{ $proizvod ->Slika}}' style='width:15vw; height:23vh;'>
      <h2>{{$proizvod-> NazivJela}}</h2>
      <p class='price'> {{$proizvod->Cijena}}kn</p>
      <p>{{$proizvod->Opis}}</p>
      <p><a href='Naruci?ID={{ $proizvod-> id}}' class='button'>Naruči odmah</a></p>
     </div>  
    @endforeach
    @else 
     <p> Nema proizvoda</p>
    @endif
</div>
</body>
</html>
