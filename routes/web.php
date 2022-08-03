<?php

use App\Http\Controllers\IspisProizvodaController;
use App\Http\Controllers\ProizvodiController;
use App\Http\Controllers\UpitiController;
use App\Http\Controllers\editPocetnaController;
use App\Http\Controllers\NarudzbeController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StranicaController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [StranicaController::class,'Pocetna']);

Route::resource('/','App\Http\Controllers\PocetnaController');

//Route::get('/Ponuda',[StranicaController::class, 'Ponuda']);
Route::resource('/Ponuda','App\Http\Controllers\ProizvodiController');

//Route::get('/Naruci', [StranicaController::class, 'Naruci']);
Route::resource('/Naruci','App\Http\Controllers\NaruciController');

Route::get('/kosarica',[App\Http\Controllers\kosaricaController::class, 'index']);
Route::get('/kosarica/store',[App\Http\Controllers\kosaricaController::class, 'store']);
Route::get('/kosarica/obrisiProizvod/{id}',[App\Http\Controllers\kosaricaController::class, 'obrisiProizvod']);
//Route ::get('/Dodaj',[StranicaController::class, 'Dodaj']);
//Route ::get('/Uredi',[StranicaController::class, 'Uredi']);


//Route:: get('/Upiti', [StranicaController::class, 'Upiti']);
Route :: resource('/Upiti','App\Http\Controllers\UpitiController');
Route:: get('UpitiController@store',[UpitiController::class,'store']);

//Route:: get('/Narudzbe', [StranicaController::class, 'Narudzbe']);
Route:: get('/NarudzbeController@store',[NarudzbeController::class,'store']);
Route :: resource('/Narudzbe','App\Http\Controllers\NarudzbeController');
//Route::get('/NarudzbaPoslana',[NarudzbeController::class,'edit']);






Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class,'__construc']);

Route::get('/home/edit/{id}',[App\Http\Controllers\HomeController::class, 'edit']);
Route::get('/home/store',[App\Http\Controllers\HomeController::class, 'store']);
Route::get('/home/obrisi/{id}',[App\Http\Controllers\HomeController::class,'obrisi']);

Route::get('/home/storeUpit',[App\Http\Controllers\HomeController::class,'storeUpit']);
Route::get('/home/editUpiti/{id}',[App\Http\Controllers\HomeController::class,'editUpiti']);
Route::get('/home/obrisiUpit/{id}',[App\Http\Controllers\HomeController::class,'obrisiUpit']);

Route::get('/home/obrisiProizvod/{id}',[App\Http\Controllers\HomeController::class,'obrisiProizvod']);
Route::get('/home/editProizvod/{id}',[App\Http\Controllers\HomeController::class,'editProizvod']);
Route::get('/home/Dodaj',[App\Http\Controllers\HomeController::class,'Dodaj']);
Route::post('/home/UrediProizvod',[App\Http\Controllers\HomeController::class,'UrediProizvod']);
Route::get('/home/EditKorisnik',[App\Http\Controllers\HomeController::class,'EditKorisnik']);
Route::post('/home/EditKorisnikStore',[App\Http\Controllers\HomeController::class,'EditKorisnikStore']);
Route::get('/home/EditKorisnikAdmin/{id}',[App\Http\Controllers\HomeController::class,'EditKorisnikAdmin']);
Route::post('/home/EditKorisnikAdminStore',[App\Http\Controllers\HomeController::class,'EditKorisnikAdminStore']);
Route::get('/home/obrisiKorisnika/{id}',[App\Http\Controllers\HomeController::class,'obrisiKorisnika']);
Route::get('/home/UrediNarudzbu/{id}',[App\Http\Controllers\HomeController::class,'UrediNarudzbu']);
Route::post('/home/UrediNarudzbuStore',[App\Http\Controllers\HomeController::class,'UrediNarudzbuStore']);
Route::get('/home/Status/{id}',[App\Http\Controllers\HomeController::class,'Status']);
Route::get('/home/StatusOtkazi/{id}',[App\Http\Controllers\HomeController::class,'StatusOtkazi']);

Route::get('/home/NarudzbaPDF/{id}', [App\Http\Controllers\HomeController::class, 'createPDF']);



Route::get('/download',[App\Http\Controllers\AdminController::class,'export'] );

Route::get('/Dodaj', [App\Http\Controllers\DodajController::class, 'index']);
Route::post('/Dodaj/store', [App\Http\Controllers\DodajController::class, 'store']);


Route::post('/home/UrediPocetnu',[App\Http\Controllers\editPocetnaController::class, 'store']);
