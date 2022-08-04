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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/StyleIndex.css')}}">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
</head>
<body>
  <nav>
    <div id="main-menu">
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
         <a href=""><i class="fa-brands fa-square-facebook"></i></i></a>
         <a href=""><i class="fa-brands fa-instagram"></i></a>
         <a href=""><i class="fa-brands fa-google"></i></i></a>
        
       
</div>

     
 <div class="section1" id="section1">
      <div class="column">
        <div>
            <br>
            <br>
            <br>
          <h1> {{$pocetna[0]->naslov}}</h1>
          <br>
          <br>
          <br>
          <p>
            {{$pocetna[0]->slogan}}
          </p>
          <br>
          <p> {{$pocetna[0]->slogan2}}</p>
        </div>
      </div>
    </div>
    
    <div class="section2" id="section2" id="grid-container">
      <h1 style="text-align:center ;">Ponuda dana:</h1><br>
      <div class="container">
        <div class="row">
          <div class="col-ms">
            <div class="card" style="width: 20vw;">
              <img src="../storage/uploads/{{ $proizvod1 ->Slika}}" alt='Pohana Piletina' class="card-img-top">
              <div class="card-body">
               <h5 class="card-title">{{$proizvod1-> NazivJela}}</h5>
               <p class='price'> {{$proizvod1->Cijena}}kn</p>
               <p class="card-text">{{$proizvod1->Opis}}</p>
               <a href='Naruci?ID={{ $proizvod1-> id}}' class="btn btn-dark">Naruči odmah</a>
             </div>
          </div>
          </div>
          <div class="col-3">

          </div>
          <div class="col-sm">
            <div class='card' style="width: 20vw;">
              <img src="../storage/uploads/{{ $proizvod2 ->Slika}}" src="../Slike/{{ $proizvod2 ->Slika}}" alt='Pohana Piletina' class="card-img-top">
              <div class="card-body">
              <h5 class="card-title">{{$proizvod2-> NazivJela}}</h5>
              <p class='price'> {{$proizvod2->Cijena}}kn</p>
              <p class="card-text">{{$proizvod2->Opis}}</p>
              <a href='Naruci?ID={{ $proizvod2-> id}}'  class="btn btn-dark">Naruči odmah</a>
              </div>
            </div>
          </div>
        </div>
       
      </div>
      <br>
      <br>
      <div class="vise">
      <a href="Ponuda" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Pregled ostalih proizvoda</a>
    </div>
</div>





<div class="section3" id="section3">
  <br>
     <div class="red">
   <div class="stupac" id="kontakt" >
    <div class="container " id="kontaktRadnoVrijeme">
      <div class="row justify-content-start">
        <div class="col-sm">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44953.161481912226!2d18.989394906413708!3d45.23621289917037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475c870cdd86d665%3A0xe696169ede694441!2sBerak!5e0!3m2!1shr!2shr!4v1655975261018!5m2!1shr!2shr" class="mapa"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
      <h2 >Kontakt:</h2>
      <p>Tel:  {{$pocetna[0]->tel}}</p>
      <p>E-mail:  {{$pocetna[0]->email}}</p>
      <p>Adresa:  {{$pocetna[0]->ulica}}  {{$pocetna[0]->broj}} </p>
      <p>Mjeso:  {{$pocetna[0]->mjesto}}</p>
        </div>
        <div class="col-6">
      <h2>Radno vrijeme:</h2>
      <p>Ponedjeljak - Četvrtak od  {{$pocetna[0]->pocetakTjedna}} do  {{$pocetna[0]->krajTjedna}} h</p>
      <p>Petak i Subota od  {{$pocetna[0]->pocetakPetak}} do  {{$pocetna[0]->krajPetak}} h</p>
      <p>Nedjelja  {{$pocetna[0]->pocetakNedjelja}} -  {{$pocetna[0]->krajNedjelja}} h</p>
        </div>
      </div>
    </div>
     </div>
     </div>
  <div class="stupac" id="kontakt">
    <div class="container " id="kontaktRadnoVrijeme">
      <div class="row justify-content-center">
        <div class="col-sm">
          <h2>Ovdje možete postaviti pitanja:</h2>
          <br>
          <form action="/UpitiController@store" method="psot">
             <label for="ime">Ime:</label><br>
             <input type="text" name="ime" placeholder="Ime:" require class="form-control ">
             <label for="prezime">Prezime:</label><br>
             <input type="text" name="prezime" placeholder="Prezime:" require class="form-control ">
             <label for="email">Vaš E-mail:</label><br>
             <input type="email" name="email" placeholder="E-mail:" require class="form-control " >
             <label for="upit"> Unesite vaš upit:</label><br>
             <textarea id="upit" name="upit" placeholder="Vaše pitanje:" class="form-control " rows="5">

             </textarea> <br>
             <input type="submit" name="submit" value="Podnesi upit" class="btn btn-dark btn-lg btn-block">
          </form>

        </div>
      </div>
    </div>
  </div></div>
<footer >
      Izradio: Robert Ello
</footer>
</html>