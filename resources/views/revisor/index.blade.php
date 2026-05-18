<x-layout>
    
    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">REVISOR DASHBOARD</h1>

        {{-- messaggio di accettazione articolo --}}
        @if (session()->has('acceptMessage'))
        <div class="alert alert-success text-center">
            {{ session('acceptMessage') }}
        </div>
        @endif

        {{-- messaggio di riggetto articolo --}}
        @if (session()->has('rejectMessage'))
        <div class="alert alert-success text-center">
            {{ session('rejectMessage') }}
        </div>
        @endif

        <!-- annunci da revisionare -->
        <div class="linea"></div>
        @if ($article_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="http://picsum.photos/600/400" class="img-fluid rounded" alt="immagine segnaposto">
                    </div>
                    @endfor
                </div>
            </div>   
            <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                <div>
                    <h1>{{$article_to_check->title}}</h1>
                    <h3>{{__('ui.author')}}:{{$article_to_check->user->name}}</h3>
                    <h4>{{$article_to_check->price}}€</h4>
                    <h4 class="fst-italic text-muted">#{{$article_to_check->category ? __("ui." . $article_to_check->category->name) : ''}}</h4>
                    <p>{{$article_to_check->description}}</p>
                </div>
                <div class="d-flex pb-4 justify-content-around">
                    <form action="{{route('accept.revisor', ['article' => $article_to_check])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-button-custom">{{__('ui.accept')}}</button>
                    </form>
                    <form action="{{route('reject.revisor', ['article' => $article_to_check])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-button-custom">{{__('ui.reject')}}</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h2>{{__('ui.noArticlesToReview')}}</h2>
                <a href="{{route('homepage')}}" class="btn btn-button-custom mt-5">HOME</a>
            </div>
        </div>
        @endif        
        <div class="linea"></div>
    </section>
    <!-- footer -->
    <x-footer></x-footer>
    
</x-layout>