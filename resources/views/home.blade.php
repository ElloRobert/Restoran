 @extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')

        
       <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
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
                       <td><a href="#" class="btn btn-danger narudzba-delete" data-toggle="modal" data-target="#myModal" data-narudzba_id="{{$narudzba->id}}">OBRIŠI</a></td>
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
    
          <div class=" upiti">
              <table  class="table_id" >
                    <thead>
                      <th>ID</th>
                      <th>Ime</th>
                      <th>Prezime</th>
                      <th>Email</th>
                      <th>Upit</th>
                      <th>Vrijeme upita</th>
                      @if($korisnik==true)
                      <th>Odgovor gumb</th>
                      <th>Obrisi gumb</th>
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
                        <td><a href='/home/editUpiti/{{$upit->id}}'   class="btn btn-success" >POSLANO</a></td>
                        <td><a href="#" class="btn btn-danger upit-delete" data-toggle="modal" data-target="#myModal" data-upit_id="{{$upit->id}}">OBRIŠI</a></td>
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
                     <table class="table_id">
                       <thead>
                     <tr >
                     <th>Ime</th>
                     <th>E-mail</th>
                     <th> Uloga</th>
                     <th>Uredi</th>
                     <th>Obriši</th> 
                     </tr>
                   </thead>
                   <tbody>
                     @foreach ($korisnici as $korisnik)
                     <tr> 
                       <td>{{$korisnik-> name}}</td>
                       <td>  {{$korisnik-> email}}</td>
                       <td>{{$korisnik -> getRoleNames()}}</td>
                       <td><a href='/home/EditKorisnikAdmin/{{$korisnik->id}}' class="btn btn-success" >UREDI</a></td>
                       <td><a href="#" class="btn btn-danger korisnik-delete" data-toggle="modal" data-target="#myModal" data-korisnik_id="{{$korisnik->id}}">OBRIŠI</a></td>
                     </tr>
                     @endforeach
                  
                   </tbody>
                @endif
                     </table>
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
           Jeste li sigurni da želite obrisati Ovo?
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

  //Brisanje proizvoda

      $('.proizvod-delete').on('click', function(){
        let proizvod_id = $(this).data('proizvod_id');
        $('#myModal .delete-route').attr('href', '/home/obrisiProizvod/' + proizvod_id);
        $('#myModal').modal('show');
      });
//Brisanje upita
    $('.upit-delete').on('click', function(){
        let upit_id = $(this).data('upit_id');
        alert(upit_id)
        $('#myModal .delete-route').attr('href', '/home/obrisiUpit/' + upit_id);
        $('#myModal').modal('show');
      });
  //Brisanje narudzbi
     $('.narudzba-delete').on('click', function(){
        let narudzba_id = $(this).data('narudzba_id');
        alert(narudzba_id);
        $('#myModal .delete-route').attr('href', '/home/obrisi/' + narudzba_id);
        $('#myModal').modal('show');
       });
   
  //Brisanje korisnika
      $('.korisnik-delete').on('click', function(){

        //Dohvati id korisnika  this= grupa označenih elemenata

        let korisnik_id = $(this).data('korisnik_id');

        //Dodavanje linka u element a kako bi otisao u rutu        
        $('#myModal .delete-route').attr('href', '/home/obrisiKorisnika/' + korisnik_id);
        //Pozivanje modala 
        $('#myModal').modal('show');

        /*  Zahtijev za dohvacanje linka na koji vodi potvrda modala(PROVJERA) 
       let href =  $('#Korisnik .delete-route').attr('href');
       alert(href);*/
        });

  //Prikaz narudzbe
   $("#Narudzbe").addClass( "active");
   $(".upiti").hide();
   $(".proizvodi").hide();
   $(".korisnik").hide();

  $("#Narudzbe").click(function(){
    $("#Narudzbe").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Proizvodi").removeClass( "active");
    $(".narudzbe").show();
    $(".upiti").hide();
    $(".proizvodi").hide();
    $(".korisnik").hide();
    });
  $("#Upiti").click(function(){
    $("#Upiti").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#Proizvodi").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".upiti").show();
    $(" .narudzbe").hide();
    $(".proizvodi").hide();
    $(".korisnik").hide();
    });
  $("#Korisnici").click(function(){
    $("#Korisnici").addClass( "active");
    $("#Proizvodi").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".korisnik").show();
    $(".proizvodi").hide();
    $(".upiti").hide();
    $(" .narudzbe").hide();
  });

  $("#Proizvodi").click(function(){
    $("#Proizvodi").addClass( "active");
    $("#Korisnici").removeClass( "active");
    $("#Upiti").removeClass( "active");
    $("#Narudzbe").removeClass( "active");
    $(".proizvodi").show();
    $(".upiti").hide();
    $(" .narudzbe").hide();
    $(".korisnik").hide();
  });
   
});
</script>
@endpush
