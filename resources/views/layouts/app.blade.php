<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
     @stack('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  

    <!-- Styles -->
    @yield('css')
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="{{ asset('css/StyleAppLogin.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
      
        <nav class="navbar">
            <div class="container">
                <div >

                        <div id="main-menu">
                        
                           <a href="/" class="natrag"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>
                        @if(isset(Auth::user()->name))
                        <div class="dropdown odjava">
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if(isset(Auth::user()->name))
                                        <img src="../storage/SlikaProfila/{{$trenutniKorisnik->Slika}}" alt="{{$trenutniKorisnik->Slika}} " class="KorisnikSlika">
                                         {{Auth::user()->name}} 
                                         @else 
                                         Admin   
                                         @endif 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a id="navbarDropdown" class="dropdown-item" href="/home/EditKorisnik" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <i class="fa fa-cog fa-spin" style="font-size:24px"></i>
                                          </a>
                                          <a class="dropdown-item"  href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                           {{ __('Log Out') }} &emsp;<i class="fa fa-sign-out" style="font-size:24px"></i>
                                       </a>
                                     
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                           @csrf
                                       </form>
                                       
                                    </div>
                                    </div>
                                    @endif 
                                  </div>
                               
                   
                    </nav>
                
                        <!-- Authentication Links -->
                        @guest
                        
                          <!-- @if (Route::has('login'))
                             
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                
                            
                            @endif 

                           @if (Route::has('register'))
                               
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif  -->
                        @else
                        
                    
                       
                               
                        
                            
                                <!--<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
                                   
                                
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
