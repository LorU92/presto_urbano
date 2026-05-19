<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="navbar-brand"></div>

        {{-- button menu --}}
        <button class="navbar-toggler button-collapse-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="navbar-icon-custom"></div>
        </button>
        
        {{-- contenuto menu --}}
        <div class="collapse navbar-collapse collapse-custom" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center align-items-center">

                {{-- home --}}
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('homepage')}}">HOME</a>
                </li>

                {{-- articoli --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index.article')}}">{{ __('ui.articles')}}</a>
                </li>
                
                {{-- dropdown categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.categories')}}
                    </a>
                    <ul class="dropdown-menu border-0 bg-transparent">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item nav-link text-center text-uppercase" href="{{route('byCategory', ['category' => $category])}}">{{ __("ui.$category->name")}}</a>
                            </li>
                            {{-- separatore --}}
                            @if (!$loop->last)
                                <li><hr class="dropdown-divider"></li>
                            @endif
                        @endforeach
                    </ul>
                </li>                 
 
                {{-- dropdown area utente --}}
                    @auth
                    {{-- Visualizza nome utente in maiuscolo --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.hello')}} {{mb_strtoupper(Auth::user()->name)}}
                        </a>

                        <ul class="dropdown-menu border-0 bg-transparent">
                            {{-- scrivi annunci --}}
                            <li>
                                <a class="dropdown-item nav-link text-center text-uppercase" href="{{route('create.article')}}">{{__('ui.writeArticles')}}</a>
                            </li>
                            
                            {{-- area revisori --}}
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item position-relative">
                                    <a class="dropdown-item nav-link text-center text-uppercase" href="{{route('index.revisor')}}">{{__('ui.reviewer')}}</a>
                                    {{-- numerino notifiche articoli da revisionare --}}
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2">
                                        {{\App\Models\Article::toBeRevisedCount()}}
                                    </span>
                                </li>
                            @endif   
                        </ul>
                    </li>
                    @endauth






                
                {{-- contatti --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('ui.contactUs')}}</a>
                </li>                    
                
                {{-- login e registrazione --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">{{__('ui.register')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                    </li>
                @endguest
                
                {{-- logout --}}
                @auth
                    {{-- Form Logout inserito correttamente dentro il tag li --}}
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link bg-transparent border-0" style="cursor: pointer;">LOGOUT</button>
                        </form>
                    </li>
                @endauth
                
                {{-- cerca --}}
                <li class="nav-item">
                    <form class="d-flex h-50" role="search" action="{{route('search.article')}}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="{{__('ui.search')}}" aria-label="Search" name="query"/>
                        <button class="btn btn-outline-success" type="submit">{{__('ui.search')}}</button>
                    </form>
                </li>
                
                {{-- cambio lingua --}}
                <li class="nav-item d-flex align-items-center">
                    <x-_locale lang='it'/>
                    <x-_locale lang='uk'/>
                    <x-_locale lang='es'/>
                </li>
            </ul>
        </div>
    </div>
</nav>