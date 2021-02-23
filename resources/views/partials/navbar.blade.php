<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="http://loslibrito.test">
        <img src="http://loslibrito.test/imgs/loslibrito.png" width="60" height="60" alt="">
        Losli Brito
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if( true || Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('biblioteca') && ! Request::is('biblioteca/nuevoLibro')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/biblioteca')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Biblioteca
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('biblioteca/nuevoLibro') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/biblioteca/nuevoLibro')}}">
                            <span>&#9884</span> Donar libro
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        {{-- Si el usuario está autenticado pondrá su nombre y la opción de cerrar sesión
                             Si el usuario no está autenticado, pondrá un botón de login/registro 
                         --}}
                        @if (Auth::check())
                            <form action="{{ url('/home') }}" method="GET" style="display:inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                    {{auth()->user()->name}}
                                </button>
                            </form>
                            <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                    Cerrar sesión
                                </button>
                            </form>
                        @else 
                        <form action="{{ url('/login') }}" method="GET" style="display:inline">
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Iniciar sesión
                            </button>
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>