@extends('layouts.app')

@section('content')
<div >
   
   
                

                <div >
                    <form method="post" action="{{ route('login') }}"  class="uredi">
                        @csrf
                        <h1>{{ __('Prijava:') }}</h1>
                        <div >
                            <label for="email">{{ __('Email Address') }}</label>

                            <div >
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                            <label for="password" >{{ __('Password') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                                  <label  for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    <input class="form-check-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </div>
                        <div>
                            <div >
                                <button type="submit" class="btn btn-success">
                                    {{ __('Prijavi se ') }}
                                </button>
                                  <br>
                                @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('Zaboravili ste lozinku?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <hr>
                        @if (Route::has('register'))
                           Još nemate korisnički račun?    
                        <a  href="{{ route('register') }}">{{ __('Registriraj se') }}</a>
                    
                     @endif  

                    </form>
                </div>
            
</div>
@endsection
