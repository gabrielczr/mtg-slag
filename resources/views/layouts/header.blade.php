
    <header>
        
        <div id="app">

        

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!--{{ config('app.name', 'Laravel') }}-->
                        MTG-SLAG
                    </a>
                        <!-- Right Side Of Navbar -->
                        <ul class="container_log">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </li>
                            @endguest
                        </ul>
                        
                    
                </div>
            </nav>


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <img id='navI' src="{{URL::asset('img/slagwhite.png')}}" >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Decks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                       
                    </ul>
                </div>
            </nav>
            <div id='middleHeader'>
    <img  id='logo' src="{{ URL::asset('img/slagred.png') }}" alt="" >
            </div>
            
    </header>