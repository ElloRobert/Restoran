<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\UpitiController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pregled narudzbi</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/StylePregledNarudzbi.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<h1>Narudzbe</h1>
<div class="mini-nav" >
    <a href="Upiti" >Pregled upita</a>
    <a href="Narudzbe" style="color: red ;" >Pregled narudzbi</a>
</div>
<a href="/" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
<body>
    <div class="narudzbe">
    <table class="tablica">
    <tr >
    <th>ID</th>
    <th>Proizvod</th>
    <th>Cijena</th>
    <th>Količina</th>
    <th>Za platiti</th>
    <th>Mjesto</th>
    <th>Adresa</th>
    <th>Vrijeme Narudzbe</th>
    <th>Poslano</th>
    <th>Vrijeme slanja</th>
    </tr>
    
 @if(count($narudzbe)>0)
    @foreach ($narudzbe as $narudzba)
    <tr> 
      <td>   {{$narudzba-> id}}    </td>
      <td>  {{$narudzba-> Proizvod}}   </td>
      <td>  {{$narudzba-> Cijena}} </td>
      <td>{{$narudzba-> Kolicina}}  </td>
      <td> {{$narudzba-> Ukupno}}  </td>
      <td> {{$narudzba-> Mjesto}}  </td>
      <td> {{$narudzba-> Adresa}}  </td>
      <td> {{$narudzba-> created_at}}      </td>
      <td><a href='/Narudzbe/{{$narudzba ->id}}/edit'   class='button-delete' >POSLANO</a></td>
      <td>{{$narudzba-> updated_at}} </td>
       <tr> 
    @endforeach
    @else 
    Nema raspoloživih upita
    @endif
      <!--href='NarudzbaPoslana?id={{$narudzba ->id}}/edit'--> 
</table>
    </div>
    
</body>
</html>