    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <div class="navbar-brand"></div>
            <button class="navbar-toggler button-collapse-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="navbar-icon-custom"></div>
            </button>
            <div class="collapse navbar-collapse collapse-custom" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('homepage')}}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index.article')}}">ANNUNCI</a>
                    </li>
                    {{-- dropdown categorie --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORIE
                        </a>
                        <ul class="dropdown-menu border-0 bg-transparent">
                            @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item nav-link text-center text-uppercase" href="{{route('byCategory', ['category' => $category])}}">{{$category->name}}</a>
                            </li>
                                @if (!$loop->last)
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>                 
                    @auth
                    {{--far comparire un tasto in cui si visualizza il nome dell'utente loggato --}}
                    {{--  mb_strtoupper() - TESTO IN MAIUSCOLO --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">CIAO {{mb_strtoupper(Auth::user()->name)}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('create.article')}}">SCRIVI/ANNUNCIO</a>
                    </li>

                    {{-- area revisori --}}
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index.revisor')}}">AREA REVISORE</a>
                            {{-- numerino notifiche articoli da revisionare --}}
                            <span class="position absolute top-0 start-100 translate middle badge rounded-pill bg-danger">
                                {{\App\Models\Article::toBeRevisedCount()}}
                            </span>
                        </li>
                    @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTATTACI</a>
                    </li>                    
                    @guest
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">REGISTRATI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        {{-- tag a può fare rotte di solo get --}}
                        {{-- tag form può fare rotte post --}}
                        <form 
                        action="{{route('logout')}}"
                        method="POST">
                        <button type="submit" class="nav-link" >LOGOUT</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>