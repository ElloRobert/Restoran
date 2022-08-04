<?php

namespace App\Http\Controllers;
use  App\Models\Pocetna;
use  App\Models\Proizvodi;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PocetnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $pocetna=Pocetna::all();
       
        $proizvodi = Proizvodi::all();
        $i=count($proizvodi);
        $prvoJelo=Proizvodi::all()->random()->id;
        $drugoJelo=Proizvodi::all()->random()->id;
        while($drugoJelo==$prvoJelo)
        {
            $drugoJelo=Proizvodi::all()->random()->id;
        }
        $proizvod1 = DB::table('proizvodis')->where('id', $prvoJelo)->first();
        $proizvod2 = DB::table('proizvodis')->where('id',$drugoJelo)->first();
        if(isset(Auth::user()->name)){
        $id = Auth::user()->id;
        $KorisnikSlika = User::find($id)->Slika;
        return view('Welcome')->with('proizvod1',$proizvod1)->with('proizvod2',$proizvod2)->with('KorisnikSlika',$KorisnikSlika)->with('pocetna',$pocetna);
        }
        else{
            return view('Welcome')->with('proizvod1',$proizvod1)->with('proizvod2',$proizvod2)->with('pocetna',$pocetna);
        }
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
        //
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
        //
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

