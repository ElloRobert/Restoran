<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\UpitiController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pregled upita</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/StylePregledNarudzbi.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<h1>Upiti</h1>
<div class="mini-nav" >
    <a href="Upiti" style="color: red ;">Pregled upita</a>
    <a href="Narudzbe">Pregled narudzbi</a>
</div>
<a href="/" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
<body>
    <table class="tablica">
    <tr >
    <th>ID</th>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Email</th>
    <th>Upit</th>
    <th>Vrijeme upita</th>
    <th>Odgovor gumb</th>
    <th>Vrijeme odgovora</th>
    </tr>
    @if(count($upiti)>0)
    @foreach ($upiti as $upit)
    <tr> 
      <td>   {{$upit-> id}}    </td>
      <td>  {{$upit-> Ime}}    </td>
      <td>  {{$upit-> Prezime}}</td>
      <td>{{$upit-> Email}}    </td>
      <td> {{$upit-> Upit}}    </td>
      <td> {{$upit-> created_at}}      </td>
      <td><a href='Upiti/{{$upit ->id}}/edit' class='button-delete' >POSLANO</a></td>
      <td>{{$upit-> updated_at}} </td>
       <tr> 
    @endforeach
    @else 
    Nema raspoloživih upita
    @endif
</table>
    
</body>
</html>