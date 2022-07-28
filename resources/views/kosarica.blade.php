<?php
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;
$Ukupna=0;
 ?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="{{url('css/StyleKosarica.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
  <body>
   

<form action="/NarudzbeController@store" method="get" class="uredikosarica" >
     <div class="naslov">
     <h1 >Vaša košarica</h1>
     <a href="/" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
      </div>
      <br>
<div class="container">
        <div class="row naslovTablice">
           
            <div class="col">
                Količina
            </div>
            <div class="col">
                Naziv 
            </div>
            <div class="col">
                Cijena
            </div>
            <div class="col">
             Ukupno
            </div>
            <div class="col">
                Ukloni
               </div>
            
        </div>
        <hr>
        @if(Session::has('narudzba'))
        @foreach (Session::get('narudzba') as $id => $kolicina )
        <?php
           $sesijaKolicina =  $kolicina[0];
           $sesijaId = $id ;
           
           $OdabraniProizvod = Proizvodi::find($sesijaId);
           //dd(Session::all());
           $sum= array_sum(session('narudzba')[$id]);
           //dd(Session::all(),$sum);
             $Ukupna= $Ukupna + ($OdabraniProizvod->Cijena*$sum);
             //dd(Session::all());
           ?>
        <div class="row">
            <div class="col">
                
                 {{$sum}}x
            </div>
            <div class="col">
                {{$OdabraniProizvod->NazivJela}}
            </div>
            <div class="col">
                {{ $OdabraniProizvod->Cijena}}kn
            </div>
            <div class="col">  
                {{$OdabraniProizvod->Cijena* $sum}}kn
            </div>
            <div class="col">
                <a href='kosarica/obrisiProizvod/{{$id}}' class="btn btn-danger">Ukloni</a>
               </div>
        </div>
        <hr>
        @endforeach
        @endif
        
        <div class="row ">
            <div class="col-10">
                Ukupno:
            </div>
            <div class=" col-2">
             {{$Ukupna}} kn
            </div>
            </div>
            @if(isset($korisnik->vip))
            @if($korisnik->vip=='VIP II')
            <div class="row ">
            <div class="col-10">
                Popust:
            </div>
            <div class="col-2">
                 10%
            </div>
            </div>
            <div class="row ">
            <div class="col-10">
                Ukupno:
            </div>
            <div class="col-2">
                
             {{$Ukupna*0.9}} 
            </div>
            </div>
            @elseif($korisnik->vip=='VIP I')
            <div class="row ">
            <div class="col-10">
                Popust:
            </div>
            <div class="col-2">
                 20%
            </div>
            </div>
            <div class="row ">
            <div class="col-10">
                Ukupno:
            </div>
            <div class="col-2">
             {{$Ukupna*0.8}} kn
            </div>
            </div>
            @endif
            @endif
            <br>
            <br>
            <div class="row">
                <div class="col-8">
                    <label for="nacin">Odaberi način plaćanja:</label><br>
                </div>
                    <div class="col-4 desno">
                        <select name="nacin" id="nacin" class="select">
                            <option value="Pouzecem"  id="Pouzecem">Plati pouzećem</option>
                            <option value="Karticom" id="Karticom">Plati karticom</option>
                        </select>
                    </div>
                </div>
            </div>
               
      </div>
    <div id="Kartica">
        <div class="row">
        <div class="col-12">
            Ime na kartici:
            </div>
            </div>
            <div class="row">
            <div class="col-12">
              <input type="text" placeholder="Ime na kartici:" >
             </div>
            </div>
            <div class="row">
             <div class="col-12">
                Broj kartice:
             </div>
            </div>
            <div class="row">
             <div class="col-12">
             <input type="text" placeholder="0000 0000 0000 0000" >
             </div>
            </div>
            <div class="row">
             <div class="col-6">
              Datum isteka:
              </div>
              <div class="col-6">
              CVC/CVV
              </div>
            </div>
            <div class="row">
              <div class="col-6">
              <input type="text" placeholder="MM/GG" >
             </div>
             <div class="col-6">
              <input type="text" placeholder="123" >
             </div> 
            </div>
        </div> 
     </div>
              
      <br>
      <label for="mjesto">Mjesto:</label><br>
      <input type="text" name="mjesto" placeholder="Mjesto:" required><br>
      <label for="mjesto">Email:</label><br>
      <input type="email" name="email" placeholder="Email:" required><br>
      <label for="adresa">Adresa:</label><br>
      <input type="text" name="adresa" placeholder="Adresa:" required>
      <br>
      <br>
      <input type="submit" name="potvrdi" value="Naruči" class="btn btn-success">
     
</form> 
    
     


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>

    $(document).ready( function () {
        $("#Kartica").hide();
        $("#nacin").on('change', function() {
            let val = $(this).val()
            if(val=="Karticom"){
             $("#Kartica").show();
            }
            else{
                $("#Kartica").hide(); 
            }
             

        });

        
    });



</script>
      
   
</body>
</html>