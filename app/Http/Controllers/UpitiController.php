<?php

namespace App\Http\Controllers;

use  App\Models\Proizvodi;
use App\Models\Upiti;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $upiti = Upiti::all();
      return view('Upiti')->with('upiti',$upiti);
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
        $upit=new Upiti;
        $upit->Ime = $request->input('ime');
        $upit->Prezime = $request->input('prezime');
        $upit->Email = $request->input('email');
        $upit->Upit=$request->input('upit');
        if(isset(Auth::user()->id))
        {
        $upit->Posiljatelj= Auth::user()->id;
        }
        $upit -> save();
        return  redirect('/');
       

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
        $upit = Upiti::find($id);
        $VrijemeOdgovora=date('Y-m-d H:i:s');
        $upit->updated_at = $VrijemeOdgovora;
        $upit->save();
        return  redirect('Upiti');

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
