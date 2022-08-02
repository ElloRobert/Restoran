<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
   body {
       font-family: DejaVu Sans, sans-serif; 
      }
      .table_id th{
      background-color: rgb(179, 176, 183);
      border-bottom: 1px solid black;
      color: black;
      text-align: left;
     }
     .table_id{
      width: 100%;
      text-align: left 
     }
 </style>
   
<title>Račun</title>
</head>
<body>
   <h1>Račun</h1>
   <div class="card-body">
      <div class="narudzbe">          
          <table  class="table_id" >
             <tbody>   
              @if(isset($narudzbe))
                 @foreach ($narudzbe as $narudzba)
               <thead>
                  <tr>
                  <th>ID</th>
                  <th>Proizvod</th>
                  <th>Količina</th>
                  <th>Cijena</th>
                  </tr>
              </thead>
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
                  </tr>
             </tbody>
             </table>
                  <br>
                  <br>
                  <table class="table_id" >
                     <tbody>
                     <tr class="ukupno">
                     <td>
                        Ukupno: 
                     </td>
                     <td>
                        {{$narudzba->Ukupno}}
                     </td>
                  </tr>
                    </tbody>    
                  </table> 
                
                  
                   
                 @endforeach
                
                 @endif
               
             </table>      
         </div>
          
</body>
</html>




