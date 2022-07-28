<?php

namespace App\Http\Controllers;
use App\Models\Proizvodi;
use App\Models\Narudzbe;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class kosaricaController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    
    public function index()
    {  
        
        //Session::flush();
        //dd(Session::all());
        $UkupnaCijena=0;
        
       
        //Ako postoji bilo koja narudzba ispisi je 
        if(Session::has('narudzba')){
            $broj=count(session('narudzba'));
             foreach (Session::get('narudzba') as $id => $kolicina )
                {
                    //dd($id);
                    //dd($kolicina[0]);
                    // dd(Session::all());
                   $sesijaKolicina =  $kolicina[0];
                   //dd($sesijaKolicina);
                   $sesijaId = $id ;
                   //dd($sesijaId);
                   $OdabraniProizvod = Proizvodi::find($sesijaId);    
                   $UkupnaCijena=$UkupnaCijena+($OdabraniProizvod->Cijena * $sesijaKolicina);
                }

                if(isset(Auth::user()->id)){
                    $korisnik= User::find(Auth::user()->id);
                    return view('kosarica')->with('broj',$broj)->with('UkupnaCijena',$UkupnaCijena)->with('korisnik',$korisnik);
                    }
                if(empty(Auth::user()->id)){
                    return view('kosarica')->with('broj',$broj)->with('UkupnaCijena',$UkupnaCijena);
                    };
             }
          
         //Ako ne postoji narudzbaisipis bez podataka
         else{ 
            //dd("uslo");
            $broj=0;
            $UkupnaCijena=0;
            if(isset(Auth::user()->id)){
                $korisnik= User::find(Auth::user()->id);
                return view('kosarica')->with('broj',$broj)->with('UkupnaCijena',$UkupnaCijena)->with('korisnik',$korisnik);
                }
            else{
                return view('kosarica')->with('broj',$broj)->with('UkupnaCijena',$UkupnaCijena);
                }
        }


    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
           
       
        $narudzba = new Narudzbe;
        $idNarudzbe = $narudzba->Proizvod= $request->input('id');
        $kolicinaNarudzbe=$narudzba->Kolicina= $request->input('kolicina');
        $jednako=false;
        if(Session::has('narudzba')){
            
             //Provjera postoji li u sesiji spremljen id koji korisnik zeli naruciti
             foreach (Session::get('narudzba') as $id => $kolicina )
             {
                
               //dd("U kosarici vec nesto ima");
               $broj=count(session('narudzba'));
               $idNarudzbe = $narudzba->Proizvod= $request->input('id');
               $kolicinaNarudzbe=$narudzba->Kolicina= $request->input('kolicina');
              
               //dd($kolicinaNarudzbe);
               $jednako=false;

               //Ako postoj takav id zapamti koji je i zapamti da on postoji
               if($idNarudzbe == $id){
                   //dd("Ta narudzba vec postoji promjeni kolicinu");
                   $jednako=true;
                   $idNarudzbe = $id;
                   $zadnji= end(session('narudzba')[$idNarudzbe]);
                   //Session::push('narudzba.'.$idNarudzbe, $kolicinaNarudzbe);
                   break;
               }
                
             
               else{
                //dd("Uslo0");
                   //dd("U kosarici postoje proizvodi ali to nije ovaj proizvod");
                   //Session::push('narudzba.'.$idNarudzbe, $kolicinaNarudzbe);
                   break;
                 }
              
        
               }
              
              
             }
             
             Session::push('narudzba.'.$idNarudzbe, $kolicinaNarudzbe);
            
             //unosite prvi element 

           
             
        
        if(isset(Auth::user()->id))
        {
        $narudzba->Narucitelj= Auth::user()->id;
        }
        $broj=count(session('narudzba'));
        return redirect('kosarica');
    }
    

    public function obrisiProizvod($id)
    {
        //dd(Session::all());
        Session::pull('narudzba.'.$id);
       // dd(Session::all());
        return redirect('kosarica');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
          
            return redirect('kosarica');
        
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
