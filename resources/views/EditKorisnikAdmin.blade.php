<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/StyleAppLogin.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="navbar">
        <div class="container">
                   <div >
                    <div id="main-menu">
                       <a href="/" class="natrag"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>
        </div>
        </div>
    </nav>
  
    <form method="post" action="/home/EditKorisnikAdminStore" class="uredi">
        @csrf
        <h1>{{ __('Uredi podatke:') }}</h1>
        <br>
        <div>
            <label for="id">ID:</label><br>
            </div>
            <div></div>
            <input  type="text" name="id" readonly class=" input"  value="{{ $Korisnik->id}}">
            <div>
        <div >
            <label for="name" >{{ __('Ime:') }}</label>
            <div >
                <input id="name" type="text" class="form-control input @error('name') is-invalid @enderror" name="name" value="{{$Korisnik->name}}" required autocomplete="name" autofocus>

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
                <input  id="email" type="email"  class="form-control input @error('email') is-invalid @enderror" name="email" value="{{$Korisnik->email}}" required autocomplete="email">

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
                <input   id="password" type="password" class="form-control input @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

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

        <div >
            <div >
                <br>
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
