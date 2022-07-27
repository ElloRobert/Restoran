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
           //dd(Session::all(),$sum);
            //$Ukupna= $Ukupna + ($OdabraniProizvod->Cijena* $sum);
             //dd(Session::all());
            $narudzba->Ukupno=$narudzba->Ukupno + ($OdabraniProizvod->Cijena* $sum);
            $new = array_push($Proizvodi, $OdabraniProizvod->id);
            $new = array_push($Kolicine, $sesijaKolicina);

        }
        $narudzba->Mjesto= $request->input('mjesto');
        $narudzba->Adresa= $request->input('adresa');  
        if(isset(Auth::user()->id))
        {
        $narudzba->Narucitelj= Auth::user()->id;
        }
        
        $narudzba -> save();
        //dd($Proizvodi,$Kolicine);
        $narudzbe = Narudzbe::find($narudzba->id);
        $broj=count($Proizvodi);
        for($i=0;$i<$broj;$i++)
        {
        $narudzbe->Proizvodi()->attach(['proizvodi_id'=> $Proizvodi[$i]],['proizvod_kolicina'=>$Kolicine[$i]]);
        }
        Session::flush();
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
