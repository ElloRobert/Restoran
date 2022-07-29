@extends('layouts.app')

@section('content')
                <div >
                    <form method="POST" action="{{ route('register') }}" class="uredi" >
                        @csrf
                        <h1>{{ __('Registriraj se:') }}</h1>
                        <div >
                            <label for="name" >{{ __('Ime:') }}</label>

                            <div >
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                            <label for="password" >{{ __('Lozinka:') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                         
                        <div >
                            <div >
                                <button type="submit"  class="btn btn-success">
                                    {{ __('Registriraj se ') }}
                                </button>
                            </div>
                        </div>
                        <hr>
                        Već imate korisniki račun?     
                        @if (Route::has('login'))
                             
                                    <a  href="{{ route('login') }}">{{ __('Prijavi se') }}</a>
                                
                            
                            @endif 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
