<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proizvodi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DodajController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $trenutniKorisnik = User::find($id);
        if($trenutniKorisnik->hasRole('Admin'))
        {
        return view('Dodaj');
        }
        else 
        return  redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $proizvod = new Proizvodi();
        $proizvod->NazivJela= $request->input('ime');
        $proizvod->Cijena = $request->input('cijena');
        $proizvod->Opis= $request->input('opis');
        $file= $request->file('slika');
        
        if($request->file('slika')){
            $file= $request->file('slika');
            $extension =$file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::putFileAs('public/uploads', $file, $filename);
            //$file->store('uploads');
            //$file->storeAs('uploads',$filename);
            $proizvod->Slika= $filename;    
         }
            $proizvod -> save();
            return  redirect('home'); 
            
        /*$proizvod = new Proizvodi();
        $proizvod->NazivJela= $request->input('ime');
        $proizvod->Cijena = $request->input('cijena');
        $proizvod->Opis= $request->input('opis');

       
        if($request->file('slika')){
            $file= $request->file('slika');
            dd($request->file('slika'));
            $extension =$file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::putFileAs('public/uploads', $file, $filename);
         
            $proizvod->Slika= $filename;
        }
       
     
        $proizvod -> save();
 
        return  redirect('home'); */ 
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
