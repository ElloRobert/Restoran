<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Narudzbe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('Admin');
    }

   
    public function create()
    {
        $User = User::all();
        $narudzbe = Narudzbe::all();
        $email= $_GET['email'];
        $lozinka=$_GET['lozinka'];
        foreach($User as $korisnik){
            if($email=$korisnik->email && $lozinka==$korisnik->password){
                return redirect('Narudzbe')->with('narudzbe',$narudzbe);
            }
            else{
                
          return 'Neispravan unos';}
        }
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
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