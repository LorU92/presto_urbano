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
        
        {{-- messaggio di rigetto articolo --}}
        @if (session()->has('rejectMessage'))
            <div class="alert alert-success text-center">
                {{ session('rejectMessage') }}
            </div>
        @endif
        
        <!-- annunci da revisionare -->
        <div class="linea"></div>

        {{-- 1. Controlliamo prima se esiste un articolo da revisionare --}}
        @if ($article_to_check)
            
            <!-- Riga principale che contiene sia la griglia di immagini (col-md-8) che i dettagli (col-md-4) -->
            <div class="row justify-content-center pt-5">            
                
                <!-- Colonna di Sinistra: Griglia Immagini -->
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        
                        {{-- 2. Controlliamo se l'articolo ha immagini, altrimenti mostriamo i segnaposto --}}
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded" alt="immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/600/400" class="img-fluid rounded" alt="immagine segnaposto">
                                </div>
                            @endfor
                        @endif

                    </div> 
                </div> 
                
                <!-- Colonna di Destra: Dettagli Articolo e Bottoni d'Azione -->
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>{{ __('ui.author') }}: {{ $article_to_check->user->name }}</h3>
                        <h4>{{ $article_to_check->price }}€</h4>
                        <h4 class="fst-italic text-muted">#{{ $article_to_check->category ? __("ui." . $article_to_check->category->name) : '' }}</h4>
                        <p>{{ $article_to_check->description }}</p>
                    </div>
                    
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('accept.revisor', ['article' => $article_to_check]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-button-custom">{{ __('ui.accept') }}</button>
                        </form>
                        
                        <form action="{{ route('reject.revisor', ['article' => $article_to_check]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-button-custom">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>

            </div> <!-- Chiude row principale esterno -->

        @else
            {{-- messaggio nessun articolo da revisionare --}}
            <div class="row justify-content-center align-items-center text-center pt-5">
                <div class="col-12">
                    <h2>{{ __('ui.noArticlesToReview') }}</h2>
                    <a href="{{ route('homepage') }}" class="btn btn-button-custom mt-5">HOME</a>
                </div>
            </div>
        @endif        
        
        <div class="linea"></div>
    </section>

    <!-- footer -->
    <x-footer></x-footer>
    
</x-layout>