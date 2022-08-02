<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\ProizvodiController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restoran </title>
    <link rel="stylesheet" type="text/css" href="{{url('css/StyleIndex.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

   <div id="main-menu">
      <nav>
        <a href="kosarica" id="kosarica"><i class="fa fa-cart-arrow-down" style="font-size:2.5vh"></i></a>
        <a href="#section1" class="active" id="prviLink">Početna</a>
        <a href="#section2">Ponuda dana </a>
        <a href="#section3">Kako do nas</a>
        <a href={{ route('login') }} class="admin">
              @if(isset(Auth::user()->name) )
              <img src="../storage/SlikaProfila/{{$KorisnikSlika}}" alt="{{$KorisnikSlika}} " class="KorisnikSlika">
               {{Auth::user()->name}}
               @else 
               Admin
               @endif
              </a>    
  </div>

        
      </nav>
   
   

  <div class="sidenav">
         <a href=""><i class="fa fa-facebook-square" style="font-size:30px"> </i></a>
         <a href=""><i class="fa fa-instagram" style="font-size:30px"></i></a>
         <a href=""><i class="fa fa-google-plus" style="font-size:30px"></i></a>
        
       
</div>

     
 <div class="section1" id="section1">
      <div class="column">
        <div>
            <br>
            <br>
          <h1>Restoran Mrak</h1>
          <p>
            Restoran čije osoblje svojim kulinarskim vještinama očarava već generacije.
          </p>
          <p>"Zajedno do punog želudca!"</p>
        </div>
      </div>
    </div>
    
    <div class="section2" id="section2" id="grid-container">
      <h1 style="text-align:center ;">Ponuda dana:</h1><br>
    
     
      <div class='card'>
        
       <img src="../storage/uploads/{{ $proizvod1 ->Slika}}" alt='Pohana Piletina' style='width:15vw; height:23vh;'>
        <h2>{{$proizvod1-> NazivJela}}</h2>
        <p class='price'> {{$proizvod1->Cijena}}kn</p>
        <p>{{$proizvod1->Opis}}</p>
        <p><a href='Naruci?ID={{ $proizvod1-> id}}' class='button'>Naruči odmah</a></p>
      </div>
    
      <div class='card'>
        <img src="../storage/uploads/{{ $proizvod2 ->Slika}}" src="../Slike/{{ $proizvod2 ->Slika}}" alt='Pohana Piletina' style='width:15vw; height:23vh;'>
        <h2>{{$proizvod2-> NazivJela}}</h2>
        <p class='price'> {{$proizvod2->Cijena}}kn</p>
        <p>{{$proizvod2->Opis}}</p>
        <p><a href='Naruci?ID={{ $proizvod2-> id}}' class='button'>Naruči odmah</a></p>
      </div>
    
    


</div>
<a href="Ponuda" class="Potvrdi">Vidi više</a>


<div class="section3" id="section3">
  <br>
     <div class="red">
   <div class="stupac" id="kontakt" >
      <h2 >Kontakt:</h2>
      <p>Tel: 099 242 7869</p>
      <p>E-mail: restoran.mrak@gmail.com</p>
      <p>Adresa: Ulica grada Vukovara 53 </p>
      <p>Grad: Osijek</p>
      <h2>Radno vrijeme:</h2>
      <p>Ponedjeljak - Četvrtak od 09 do 23 h</p>
      <p>Petak i Subota od 09 do 01 h</p>
      <p>Nedjelja 09 - 23 h</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44953.161481912226!2d18.989394906413708!3d45.23621289917037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475c870cdd86d665%3A0xe696169ede694441!2sBerak!5e0!3m2!1shr!2shr!4v1655975261018!5m2!1shr!2shr" class="mapa"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

     </div>
  <div class="stupac" id="kontakt">
    <h2>Upit:</h2>
     <form action="/UpitiController@store" method="psot">
        <label for="ime">Ime:</label><br>
        <input type="text" name="ime" placeholder="Ime:" require> <br>
        <label for="prezime">Prezime:</label><br>
        <input type="text" name="prezime" placeholder="Prezime:" require><br>
        <label for="email">Vaš E-mail:</label><br>
        <input type="email" name="email" placeholder="E-mail:" require><br>
        <label for="upit"> Unesite vaš upit:</label><br>
        <textarea id="upit" name="upit" placeholder="Vaše pitanje:"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" class="potvrdiUpit" value="Podnesi upit">
      
     </form>
   </div>
</div>
<footer >
    <hr>
    Izradio: Robert Ello
</footer>
</body>
</html>