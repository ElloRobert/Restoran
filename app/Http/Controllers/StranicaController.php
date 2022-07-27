<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StranicaController extends Controller
{
   public function Dodaj(){
    return view('Dodaj');
  }
  public function Uredi(){
   
    return view('Uredi');
  }
  public function Ponuda(){
    return view('Ponuda');
  }
  public function Naruci(){
    return view('Naruci');
  }
  public function Upiti(){
    return view('Upiti');
  }
  public function Narudzbe(){
    return view('Narudzbe');
  }
  public function Login()
  {
    return view('login');
  }
}
