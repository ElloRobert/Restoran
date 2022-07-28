<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use  App\Models\Narudzbe;
use App\Models\Upiti;
use App\Models\Proizvodi;
use App\Models\narudzbe_proizvodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      /*Provjera je li korisnik moze koristiti odredenu premisson*/
      $id = Auth::user()->id;
      $trenutniKorisnik = User::find($id);
      if($trenutniKorisnik->hasRole('Admin')){
        $korisnik=true;
        $korisnici= User::all();
        $proizvodi=Proizvodi::all();
        $narudzbe = Narudzbe::all();
        $upiti = Upiti::all();
        $NaruceniProizvodi= narudzbe_proizvodi::all();
        return view('home')->with('narudzbe',$narudzbe)->with('upiti',$upiti)->with('korisnik',$korisnik)->with('proizvodi',$proizvodi)->with('korisnici',$korisnici)->with('NaruceniProizvodi',$NaruceniProizvodi);
      }
      else{
        $korisnik=false;
        $id = Auth::user()->id;
        $narudzbe = Narudzbe::all()->where('Narucitelj',$id);
        $upiti = Upiti::all()->where('Posiljatelj',$id);
        $proizvodi=Proizvodi::all();
        $NaruceniProizvodi= narudzbe_proizvodi::all();
        return view('home')->with('narudzbe',$narudzbe)->with('upiti',$upiti)->with('korisnik',$korisnik)->with('NaruceniProizvodi',$NaruceniProizvodi)->with('proizvodi',$proizvodi);
      }
    
    }

    public function edit($id)
    {
        $narudzba = Narudzbe::find($id);
        $VrijemeSlanja=date('Y-m-d H:i:s');
        $narudzba->updated_at = $VrijemeSlanja;
        $narudzba->save();
        return  redirect('home');


    }
    public function store(Request $request)
    {
           

        $narudzba = new Narudzbe;
        $narudzba->Proizvod= $request->input('ime');
        $narudzba->Cijena = $request->input('cijena');
        $narudzba->Kolicina= $request->input('kolicina');
        $narudzba->Ukupno = $narudzba->Kolicina * $narudzba->Cijena;
        $narudzba->Mjesto= $request->input('mjesto');
        $narudzba->Adresa= $request->input('adresa'); 
        $narudzba->Narucitelj= Auth::user()->id;
        $narudzba -> save();
        return  redirect('/');
    }
    public function obrisi($id)
    {
        $narudzba = Narudzbe::find($id);
        $narudzba->delete();
        return redirect('home');
    }

    public function storeUpit(Request $request)
    {
        $upit=new Upiti;
        $upit->Ime = $request->input('ime');
        $upit->Prezime = $request->input('prezime');
        $upit->Email = $request->input('email');
        $upit->Upit=$request->input('upit');
      
        $upit->Posiljatelj= Auth::user()->id;
        $upit -> save();
        return  redirect('/');

    }

    public function editUpiti($id)
    {
     
        $upit = Upiti::find($id);
        $VrijemeSlanja=date('Y-m-d H:i:s');
        $upit->updated_at = $VrijemeSlanja;
        $upit->save();
        return  redirect('home');
        


    }
    public function obrisiUpit($id)
    {
        $upit = upiti::find($id);
        $upit->delete();
        return redirect('home');
    }
    public function obrisiProizvod($id)
    {
        $proizvod = Proizvodi::find($id);
        $proizvod->delete();
        return redirect('home');
    }
    public function editProizvod($id)
    {   
         $idadmin = Auth::user()->id;
        $trenutniKorisnik = User::find($idadmin);
         if($trenutniKorisnik->hasRole('Admin'))
        {
        $proizvod = Proizvodi::find($id);
        return  view('Uredi')->with('proizvod',$proizvod);
       }
       else 
       {
        return redirect('home');
       }
    }
    
    public function UrediProizvod( Request $request)
    {   
        $id =$request->input('id');
        $proizvod = $proizvod = Proizvodi::find($id);
        $proizvod->NazivJela= $request->input('ime');
        $proizvod->Cijena = $request->input('cijena');
        $proizvod->Opis= $request->input('opis');
    
    
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
    }

   /* public function Dodaj(){
        return view('Dodaj');
      }*/
      public function Uredi(){
       
        return view('Uredi');
      }
      public function EditKorisnik()
      {
        $id = Auth::user()->id;
        $trenutniKorisnik = User::find($id);
        $Korisnik = User::all()->where('id',$id);
        $greska='';
        return view('EditKorisnik')->with('korisnik',$Korisnik)->with('greska',$greska);;
      }
      
      
    public function EditKorisnikStore(request $request)
    {
        $id = Auth::user()->id;
        $upit = Upiti::find($id);
        $id = Auth::user()->id;
        $Korisnik = User::find($id);
        $Korisnik->name = $request->input('name');
        $Korisnik->email = $request->input('email');
        $Lozinka= $request->input('password');
        $Potvrda = $request->input('password_confirmation');
        if($Lozinka==$Potvrda)
        {
        $Korisnik->password=  Hash::make($Lozinka);
        $Korisnik -> save();
        }
        else{
             $greska='Lozinka nije valjana';
             return view('EditKorisnik')->with('greska',$greska);

        }

        $proizvodi=Proizvodi::all();
        $narudzbe = Narudzbe::all();
        $upiti = Upiti::all();
        return redirect('home');
    }
    public function EditKorisnikAdmin($id)
    {
      $Korisnik = User::find($id);
      $greska='';
      return  view('EditKorisnikAdmin')->with('Korisnik',$Korisnik)->with('greska',$greska);
    }

    public function obrisiKorisnika($id)
    {     
          $Korisnik = User::find($id);
          $Korisnik->delete();
          return redirect('home');
      
    }
 }
