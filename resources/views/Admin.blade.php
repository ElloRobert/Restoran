<?php 
use Illuminate\Support\Facades\DB;
use  App\Models\Proizvodi;
use App\Http\Controllers\NaruciController;?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="{{url('css/StyleAdmin.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body>

<form action="/Admin/create" method="get" class="uredi" >
     <div style="text-align: center;">
     <h1 >Prijava</h1>
     <a href="/" class="natrag" ><i class="fa fa-arrow-left" style="font-size:36px"></i></a>
     </div>
      <label for="ime">Korisnicko ime:</label><br>
      <input type="text" name="ime"  placeholder="Korisnicko ime:"><br>
      <label for="lozinka">Lozinka:</label><br>
      <input type="password" name="lozinka"  placeholder="Lozinka:">
      <br>
      <br>
      <input type="submit" name="submit" value="Potvrdi" class="button-confirm">
   
      <?php /*
        if(isset($_POST['potvrdi'])){
            $KorisnickoIme=$_POST['ime'];
            $Lozinka=$_POST['lozinka'];
            $sql = "SELECT * FROM admin";
            $result = mysqli_query ($conn, $sql);
            $resultCheck =  mysqli_num_rows($result);
            if($resultCheck > 0)
            {
              while( $row = mysqli_fetch_assoc($result))
              {
                  if($KorisnickoIme==$row['KorisnickoIme'] && $Lozinka ==$row['Lozinka']){
                    header("Location: PregledNarudzbi.php");
                  }
              } 
              echo "Neispravni podaci, pokušajte ponovno!";
        }
    }
      */ ?>
</form> 
     
     
      
   
</body>
</html>