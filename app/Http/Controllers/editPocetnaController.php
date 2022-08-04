<?php

namespace App\Http\Controllers;

use App\Models\Pocetna;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class editPocetnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pocetna= Pocetna::find(1);
        $pocetna->naslov = $request->input('naslov');
        $pocetna->slogan= $request->input('slogan');
        $pocetna->slogan2= $request->input('slogan2');
        $pocetna->tel= $request->input('tel');
        $pocetna->email= $request->input('email');
        $pocetna->ulica= $request->input('ulica');
        $pocetna->broj= $request->input('broj');
        $pocetna->mjesto= $request->input('mjesto');
        $pocetna->pocetakTjedna= $request->input('pocetakTjedan');
        $pocetna->krajTjedna= $request->input('krajTjedan');
        $pocetna->pocetakPetak= $request->input('pocetakPetak');
        $pocetna->krajPetak= $request->input('krajPetak');
        $pocetna->pocetakNedjelja= $request->input('pocetakNedjelja');
        $pocetna->krajNedjelja= $request->input('krajNedjelja');
        if($request->file('slika')){
   
            $file= $request->file('slika');
            $extension =$file->getClientOriginalExtension();
            $filename ='Restoran.'.$extension;
            Storage::putFileAs('public/PocetnaSlike', $file, $filename);
            $pocetna->slika= $filename;
           
        }
       $pocetna->save();
       return redirect('home');
        
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
