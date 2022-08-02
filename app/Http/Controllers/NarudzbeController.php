<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use  App\Models\Proizvodi;
use App\Models\Narudzbe;
use App\Models\NarudzbeProizvodi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NarudzbeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $narudzbe = Narudzbe::all();
        return view('Narudzbe')->with('narudzbe',$narudzbe); 
    }

  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $Ukupna=0;
        
        $narudzba = new Narudzbe;
        $narudzba->Ukupno=0;
        $Proizvodi=[];
        $Kolicine=[];
        $NarudzbeId=[];
        if(Session::has('narudzba')){
        foreach (Session::get('narudzba') as $id => $kolicina ){
            $sesijaKolicina =  $kolicina[0];
            $sesijaId = $id;
            $OdabraniProizvod = Proizvodi::find($sesijaId);
           //dd(Session::all());
            $sum= array_sum(session('narudzba')[$id]);

            if(isset(Auth::user()->id)){
                $korisnik= User::find(Auth::user()->id);
                if($korisnik->vip =='VIP I'){
                    $narudzba->Ukupno=0.8*($narudzba->Ukupno + ($OdabraniProizvod->Cijena* $sum)); 
                  
                }
                elseif($korisnik->vip =='VIP II')
                $narudzba->Ukupno=0.9*($narudzba->Ukupno + ($OdabraniProizvod->Cijena* $sum)); 
                 
                else{
                $narudzba->Ukupno=$narudzba->Ukupno + ($OdabraniProizvod->Cijena* $sum);
            }}
            else{
                $narudzba->Ukupno=$narudzba->Ukupno + ($OdabraniProizvod->Cijena* $sum);
            }
            $new = array_push($Proizvodi, $OdabraniProizvod->id);
            $new = array_push($Kolicine, $sesijaKolicina);

        }
        $narudzba->Status ="Primljeno";
        $narudzba->Mjesto= $request->input('mjesto');
        $narudzba->Adresa= $request->input('adresa');  
        if(isset(Auth::user()->id))
        {
        $narudzba->Narucitelj= Auth::user()->id;
        if($narudzba->Ukupno>100)
        {
           $korisnik= User::find(Auth::user()->id);
           $korisnik->bodovi+=10;
           if($korisnik->bodovi>100){
             $korisnik->vip='VIP I';
           }
           elseif ($korisnik->bodovi>50) {
            $korisnik->vip='VIP II';
           } 
            
           
           $korisnik-> save();
        }
        }
        
        $narudzba -> save();
        //dd($Proizvodi,$Kolicine);
        $narudzbe = Narudzbe::find($narudzba->id);
        $broj=count($Proizvodi);
        for($i=0;$i<$broj;$i++)
        {
        $narudzbe->Proizvodi()->attach(['proizvodi_id'=> $Proizvodi[$i]],['proizvod_kolicina'=>$Kolicine[$i]]);
        }
        Session::forget('narudzba');
        return redirect("/");
       }}
        
        
          
       
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $narudzba = Narudzbe::find($id);
        $VrijemeSlanja=date('Y-m-d H:i:s');
        $narudzba->updated_at = $VrijemeSlanja;
        $narudzba->save();
        return  redirect('Narudzbe');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
