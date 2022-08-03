 @extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')

       <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link" id="PregledNarudzbi">Pregled narudzbi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Narudzbe">Narudzbe</a>
                  </li>
                  <li class="nav-item"  >
                    <a class="nav-link" id="Upiti">Upiti</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Proizvodi" >Proizvodi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="Korisnici">Korisnici</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pocetnaStranica">Pocetna stranica</a>
                  </li>
                </ul>
              </div>
     <div class="card-body">
          <div class="narudzbe">          
              <table  class="table_id" >
                 <thead>
                     <tr >
                     <th>ID</th>
                     <th>Proizvod</th>
                     <th>Količina</th>
                     <th>Cijena</th>
                     <th>Za platiti</th>
                     <th>Mjesto</th>
                     <th>Adresa</th>
                     <th>Vrijeme Narudzbe</th>
                     @if($korisnik==true)
                     <th>Odgovor gumb</th>
                     <th>Obrisi gumb</th>
                     @endif
                     <th>Vrijeme slanja</th>
                     </tr>
                 </thead>
     
                 <tbody>   
                  @if(isset($narudzbe))
                     @foreach ($narudzbe as $narudzba)
                        <tr> 
                       <td>  {{$narudzba->id}}    </td>
                       <td>
                      
                        <?php
                        $Naruceni=$NaruceniProizvodi->where('narudzbe_id',$narudzba->id);
                        foreach($Naruceni as $NaruceniProizvod)
                        {
                          
                          $IdProizvoda = $NaruceniProizvod['proizvodi_id']-1;
                           echo  $proizvodi[$IdProizvoda]['NazivJela'].' <br>';
                          
                        }
                        ?>
                       </td>
                     
                       <td>
                        <?php
                        $Naruceni=$NaruceniProizvodi->where('narudzbe_id',$narudzba->id);

                        foreach($Naruceni as $NaruceniProizvod)
                        {
                          
                         
                           echo  $NaruceniProizvod['proizvod_kolicina'].'x<br>';
                          
                        }
                        ?>
                       </td>
                       <td>
                        <?php
                        $Naruceni=$NaruceniProizvodi->where('narudzbe_id',$narudzba->id);
                       
                        foreach($Naruceni as $NaruceniProizvod)
                        {
                          
                           $IdProizvoda = $NaruceniProizvod['proizvodi_id']-1;
                           echo $proizvodi[$IdProizvoda]['Cijena'].'<br>';
                          
                        }
                        ?>
                       </td>
                       <td> {{$narudzba->Ukupno}}  </td>
                       <td> {{$narudzba->Mjesto}}  </td>
                       <td> {{$narudzba->Adresa}}  </td>
                       <td> {{$narudzba->created_at}}</td>
                       @if($korisnik==true)
                       <td><a href='/home/edit/{{$narudzba->id}}'   class="btn btn-success" >POSLANO</a></td>
                       <td><button class="btn btn-danger narudzba-delete" data-toggle="modal" data-target="#myModal" data-narudzba_id="{{$narudzba->id}}">OBRIŠI</button></td>
                       @endif
                      <td>  {{$narudzba->updated_at }} </td> 
                      </tr>
                     @endforeach
                     @else 
                     Nema raspoloživih narudžbi
                     @endif
                   </tbody>    
                 </table>      
             </div>
              
              </div>
    
          <div class="upiti">
              <table  class="table_id">
                    <thead>
                      <th>ID</th>
                      <th>Ime</th>
                      <th>Prezime</th>
                      <th>Email</th>
                      <th>Upit</th>
                      <th>Vrijeme upita</th>
                      @if($korisnik==true)
                      <th>gumbi</th>
                      @endif
                      <th>Vrijeme odgovora</th>
                      </tr>
                      </thead>
      
                     <tbody>            
                      @if(isset($upiti))
                      @foreach ($upiti as $upit)
                      <tr> 
                        <td>   {{$upit->id}}    </td>
                        <td>  {{$upit->Ime}}    </td>
                        <td>  {{$upit->Prezime}}</td>
                        <td>{{$upit->Email}}    </td>
                        <td> {{$upit->Upit}}    </td>
                        <td> {{$upit->created_at}}</td>
                        @if($korisnik==true)
                        <td class="gumbi">
                        <a href='/home/editUpiti/{{$upit->id}}'  class="zelena"><i class="fa-solid fa-check"></i></a>
                        <a href="#"  data-toggle="modal" data-target="#myModal" data-upit_id="{{$upit->id}}"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        @endif
                        <td>{{$upit-> updated_at}} </td>
                      </tr> 
                      @endforeach
                    
                      @else 
                      Nema raspoloživih upita
                      @endif   
                     </tbody>
                  </table>
              </div>
          <div class="proizvodi">
              @if($korisnik==true)
               <br>
                  <a href='/Dodaj'   class='btn  btn-secondary btn-lg button-dodaj'  >+ PROIZVOD</a>
                  <table class="table_id">
                    <thead>
                  <tr >
                  <th>Slika</th>
                  <th>Naziv jela</th>
                  <th>Cijena</th>
                  <th>Opis</th>
                  <th>Uredi</th>
                  <th>Obriši</th> 
                  </tr>
                </thead>
                <tbody>
                  @foreach ($proizvodi as $proizvod)
                  <tr> 
                    <td id="SlikaProizvoda"> <img src="../storage/uploads/{{ $proizvod ->Slika}}" alt="{{$proizvod-> Slika}} "> </td>
                    <td>  {{$proizvod-> NazivJela}}    </td>
                    <td>  {{$proizvod-> Cijena}}</td>
                    <td>{{$proizvod-> Opis}}    </td>
                    <td><a href='/home/editProizvod/{{$proizvod->id}}' class="btn btn-success" >UREDI</a></td>
                    <td><a href="#" class="btn btn-danger proizvod-delete" data-toggle="modal" data-target="#myModal" data-proizvod_id="{{$proizvod->id}}">OBRIŠI</a></td>
                  </tr>
                  @endforeach
                </tbody>
                  </table>
                  @endif
                </div>   

          <div class="korisnik">
              @if($korisnik==true)
              <a style="font-size:16px" href='/download' class='btn  btn-secondary btn-lg button-excel'><i class="fa-solid fa-file-excel"></i></a>
              <table class="table_id">
                <thead>
                <tr >
                <th>Ime</th>
                <th>E-mail</th>
                <th> Uloga</th>
                <th>Uredi</th>
                <th>Obriši</th>
                <th>Bodovi</th>
                <th>Vip</th>
                </tr>
                </thead>
                   <tbody>
                     @foreach ($korisnici as $korisnik)
                     <tr> 
                       <td>{{$korisnik-> name}}</td>
                       <td>  {{$korisnik-> email}}</td>
                       <td>{{$korisnik -> getRoleNames()[0]}}</td>
                       <td><a href='/home/EditKorisnikAdmin/{{$korisnik->id}}' class="btn btn-success" >UREDI</a></td>
                       <td><a href="#" class="btn btn-danger korisnik-delete" data-toggle="modal" data-target="#myModal" data-korisnik_id="{{$korisnik->id}}">OBRIŠI</a></td>
                       <td>{{$korisnik->bodovi}}</td>
                       <td>  {{$korisnik->vip}}</td>
                     </tr>
                     @endforeach
                  
                   </tbody>
                @endif
                     </table>
                   </div> 
          <div class="PregledNarudzbi">
            <table  class="table_id" >
              <thead>
                  <tr >
                  <th>ID</th>
                  <th>Ime</th>
                  <th>Cijena</th>
                  <th>Vrijeme Narudžbe</th>
                  <th>Status</th>
                  <th>Akcije</th>
                  </tr>
              </thead>
  
              <tbody>   
               @if(isset($narudzbe))
                  @foreach ($narudzbe as $narudzba)
                    <tr> 
                    <td>  {{$narudzba->id}}    </td>
                    <td>
                      <?php
                        if(isset($narudzba->Narucitelj)){
                          $idKorisnika=$narudzba->Narucitelj;
                          $korisnica= $korisnici->find($idKorisnika);
                           echo  $korisnica->name;
                        }
                      ?>
                    </td>
                    <td> {{$narudzba->Ukupno}} kn  </td>
                    <td> {{$narudzba->created_at}}</td>
                    <td> {{$narudzba->Status}} </td>
                    <td class="gumbi">
                    <a href="/home/Status/{{$narudzba->id}}" class="zelena"><i class="fa-solid fa-check"></i></a>
                    <a href='/home/StatusOtkazi/{{$narudzba->id}}' class="crvena"><i class="fa-solid fa-xmark"></i></a>
                    <a href='/home/UrediNarudzbu/{{$narudzba->id}}'><i class='fas fa-pencil-alt'> </i></a>
                    <a href="/home/NarudzbaPDF/{{$narudzba->id}}"><i class="fa-solid fa-print"></i></a>
                    <button class='fas narudzba-delete ' data-toggle="modal" data-target="#myModal" data-narudzba_id="{{$narudzba->id}}"><i class='fas '>&#xf2ed;</i></button>
                    </td>
                  
                  @endforeach
                  @else 
                  Nema raspoloživih narudžbi
                  @endif
                </tbody>    
              </table>      
           </div>
          <div class="pocetnaStranica">
            <h2>Uređivanje elemenata početne stranice</h2>
            <form method="post" action="home/UrediPocetnu" class="editPocetna" enctype="multipart/form-data">
              @csrf
              <div class="container">
                <div class="row">
                <div class="col-4">
                   <label for="naslov">Naslov:</label><br>
                   <input type="text" name="naslov" id="naslov" class="form-control input" placeholder="Naslov" value="{{$pocetna[0]->naslov}}">
                </div>
                <div class="col-8">
              <label for="slogan">Slogan:</label><br>
              <input type="text" name="slogan" id="slogan" class="form-control input" placeholder="Slogan" value="{{$pocetna[0]->slogan}}">
                </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-6">
              <label for="tel">Tel:</label><br>
              <input type="text" name="tel" id="tel" class="form-control input" placeholder="Tel" value="{{$pocetna[0]->tel}}">
                  </div>
                  <div class="col-6">
              <label for="email">Email:</label><br>
              <input type="text" name="email" id="email" class="form-control input" placeholder="email" value="{{$pocetna[0]->email}}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-4">
              <label for="ulica">Ulica:</label><br>
              <input type="text" name="ulica" id="ulica" class="form-control input" placeholder="Ulica" value="{{$pocetna[0]->ulica}}">
                  </div>
                  <div class="col-4">
              <label for="broj">Kućni broj:</label><br>
              <input type="number" name="broj" id="broj" class="form-control input" placeholder="Kućni broj" value="{{$pocetna[0]->broj}}">
                  </div>
                  <div class="col-4">
              <label for="mjesto">Mjesto:</label><br>
              <input type="text" name="mjesto" id="mjesto" class="form-control input" placeholder="Mjesto" value="{{$pocetna[0]->mjesto}}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-7">
              <label for="pocetakTjedan">Radno vrijemme ponedjeljak - četvrtak:</label><br>
                  </div>
                  <div class="col-5">
              <input type="number" name="pocetakTjedan" id="pocetakTjedan" class="form-control input" max=24 min=0 placeholder="Početak rada" value="{{$pocetna[0]->pocetakTjedna}}">
              <input type="number" name="krajTjedan" id="krajTjedan" class="form-control input" max=24 min=0 placeholder="Kraj rada" value="{{$pocetna[0]->krajTjedna}}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-7">
              <label for="pocetakPetak">Radno vrijemme petak i subota:</label><br>
                  </div>
                  <div class="col-5">
              <input type="number" name="pocetakPetak" id="pocetakPetak" class="form-control input" max=24 min=0 placeholder="Početak rada" value="{{$pocetna[0]->pocetakPetak}}">
              <input type="number" name="krajPetak" id="krajPetak" class="form-control input" max=24 min=0 placeholder="Kraj rada" value="{{$pocetna[0]->krajPetak}}">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-7">
              <label for="pocetakNedjelja">Radno vrijemme nedjelja:</label><br>
                  </div>
                  <div class="col-5">
              <input type="number" name="pocetakNedjelja" id="pocetakNedjelja" class="form-control input" max=24 min=0 placeholder="Početak rada" value="{{$pocetna[0]->pocetakNedjelja}}">
              <input type="number" name="krajNedjelja" id="krajNedjelja" class="form-control input" max=24 min=0 placeholder="Kraj rada"value="{{$pocetna[0]->krajNedjelja}}">
                  </div>
                </div>
                <br>
              <div class="row">
                <div class="col-7">
                <label for="img">Odaberi fotografiju naslovne stranice:</label>
                </div>
                <div class="col-5">
                <input class="slika" type="file" id="slika" name="slika" value="" accept="image/*">
                </div>
               </div>
               <br>
               <input type="submit" name="potvrdi" value="Spremi promjene" class="btn btn-success">

            </form>
          </div>
            </div>      
            </div>      
            
   </div>       
            
<!-- Modal Korisnik -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Oprez</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
           Jeste li sigurni da želite obrisati?
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Ne</button>
         <td><a href="" class="btn btn-success delete-route">Da</a></td>
       </div>
     </div>
   </div>
 </div>
  

@endsection
@push('scripts')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {


  //Dodavanje plug ina tablica u dokument
      $('.table_id').DataTable();

       
$('.table_id').on( 'length.dt', function ( e, settings, len ) {
    console.log( 'alert: '+len );
} );
  //Brisanje proizvoda

  $('.table_id').on('click', '.proizvod-delete', function()
      {
        let proizvod_id = $(this).data('proizvod_id');
        
        $('#myModal .delete-route').attr('href', '/home/obrisiProizvod/' + proizvod_id);
        $('#myModal').modal('show');
      });
//Brisanje upita
    $('.upit-delete').on('click', function(){
        let upit_id = $(this).data('upit_id');
        alert(upit_id);
        $('#myModal .delete-route').attr('href', '/home/obrisiUpit/'+upit_id);
        $('#myModal').modal('show');
      });


  //Brisanje narudzbi
    $('.table_id').on('click', '.narudzba-delete', function(){
        let narudzba_id = $(this).data('narudzba_id');
        alert(typeof narudzba_id + ' : ' + narudzba_id);
        console.log('Klik:' + this);
        $('#myModal .delete-route').attr('href', '/home/obrisi/'+narudzba_id);
        $('#myModal').modal('show');
       });
       $('.table_id.dataTable').bind('page', function () {
          // Call same code as for ready here
          $('.narudzba-delete').on('click', function(){
          let narudzba_id = $(this).data('narudzba_id');
          alert('Bind' + typeof narudzba_id + ' : ' + narudzba_id);

          });
     
      });
  //Brisanje korisnika
      $('.korisnik-delete').on('click', function(){

        //Dohvati id korisnika  this= grupa označenih elemenata

        let korisnik_id = $(this).data('korisnik_id');

        //Dodavanje linka u element a kako bi otisao u rutu        
        $('#myModal .delete-route').attr('href', '/home/obrisiKorisnika/'+korisnik_id);
        //Pozivanje modala 
        $('#myModal').modal('show');

        /*  Zahtijev za dohvacanje linka na koji vodi potvrda modala(PROVJERA) 
       let href =  $('#Korisnik .delete-route').attr('href');
       alert(href);*/
        });

  //Prikaz narudzbe
   $("#PregledNarudzbi").addClass( "active");
   $(".PregledNarudzbi").show();
   $(".pocetnaStranica").hide();
   $("#Narudzbe").hide();
   $(".upiti").hide();
   $(".proizvodi").hide();
   $(".korisnik").hide();
   $(".narudzbe").hide();
 

  $("#Narudzbe").click(function(){
    $("#Narudzbe").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#PregledNarudzbi").removeClass( "active");
    $("#Proizvodi").removeClass( "active");
    $(".narudzbe").show();
    $(".upiti").hide();
    $(".proizvodi").hide();
    $(".korisnik").hide();
    $(".PregledNarudzbi").hide();
    $("#pocetnaStranica").removeClass( "active");
    $(".pocetnaStranica").hide();
    });
  $("#Upiti").click(function(){
    $("#Upiti").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#PregledNarudzbi").removeClass( "active");
    $("#Proizvodi").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".upiti").show();
    $(" .narudzbe").hide();
    $(".proizvodi").hide();
    $(".korisnik").hide();
    $(".PregledNarudzbi").hide();
    $("#pocetnaStranica").removeClass( "active");
    $(".pocetnaStranica").hide();
    });
  $("#Korisnici").click(function(){
    $("#Korisnici").addClass( "active");
    $("#Proizvodi").removeClass( "active");
    $("#PregledNarudzbi").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".korisnik").show();
    $(".proizvodi").hide();
    $(".upiti").hide();
    $(" .narudzbe").hide();
    $(".PregledNarudzbi").hide();
    $("#pocetnaStranica").removeClass( "active");
    $(".pocetnaStranica").hide();
  });
  $("#PregledNarudzbi").click(function(){
    $("#PregledNarudzbi").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#Proizvodi").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".PregledNarudzbi").show();
    $(".korisnik").hide();
    $(".proizvodi").hide();
    $(".upiti").hide();
    $(" .narudzbe").hide();
    $("#pocetnaStranica").removeClass( "active");
    $(".pocetnaStranica").hide();
  });

  $("#Proizvodi").click(function(){
    $("#Proizvodi").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#PregledNarudzbi").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".proizvodi").show();
    $(".upiti").hide();
    $(" .narudzbe").hide();
    $(".korisnik").hide();
    $(".PregledNarudzbi").hide();
    $("#pocetnaStranica").removeClass( "active");
    $(".pocetnaStranica").hide();
  });


  $("#pocetnaStranica").click(function(){
    $("#pocetnaStranica").addClass( "active");
    $(".pocetnaStranica").show();
    $("#Proizvodi").removeClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#PregledNarudzbi").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".proizvodi").hide();
    $(".upiti").hide();
    $(" .narudzbe").hide();
    $(".korisnik").hide();
    $(".PregledNarudzbi").hide();
  });
   
});


</script>
@endpush
