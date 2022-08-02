<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/StyleUrediPodatke.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div >
  
                    <div id="main-menu">
                    
                       <a href="/home" class="natrag"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                  
                      
                              </div>
        </div>
               
                </nav>
  
    <form method="POST" action="/home/EditKorisnikStore" class="uredikosarica" enctype="multipart/form-data">
        @csrf
        <div class="zaglavlje">
         <img src="../storage/SlikaProfila/{{$KorisnikSlika}}" alt="{{$KorisnikSlika}} " class="UrediSlika">
        <h1 class="naslov" >Uredi podatke</h1>
        </div>
        <br>
        <br>
        <br>
        <div class="sadrzaj">
            <label for="name" >{{ __('Ime:') }}</label>
            <div >
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}"  autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div >
            <label for="email" >{{ __('Email:') }}</label>

            <div >
                <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}"  autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div >
            <label for="password" >{{ __('Nova lozinka:') }}</label>

            <div >
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div >
            <label for="password-confirm" >{{ __('Potvrdi lozinku:') }}</label>

            <div >
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
              {{$greska}}
            </div>
        </div>
       
        <div>
        <label for="img">Odaberi fotografiju:</label>
        </div>
        <input class="slika" type="file" id="slika" name="slika" value="" accept="image/*">
       </div>
        <div >
            <div >
                <button type="submit"  class="btn btn-success">
                    {{ __('Spremi promjene') }}
                </button>
            </div>
        </div>     
            
    </form>
</div>
</div> 
</body>
</html> 
