<x-layout>
    
    <!-- section annunci -->
    <section class="container">
        <h1 class="evento-custom">{{$article->title}}</h1>

        <div class="linea"></div>

        {{-- dettagli articolo row --}}
        <div class="row">

            {{-- Colonna di Sinistra: Immagini --}}
            <div class="col-12 col-md-6 col-mb-3 py-5">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="http://picsum.photos/600/400" class="d-block w-100" alt="Immagine segnaposto">
                @endif
            </div>

            {{-- Colonna di Destra: Dettagli Articolo --}}
            <div class="col-12 col-md-6 col-mb-3 py-5 ">
                <h2 class="display-5"><span class="titleevento">{{$article->title}}</span></h2>
                <div class="d-flex justify-content-center flex-column">
                    <h3 class="">{{__('ui.price')}}</h3>
                    <h2 class="">{{$article->price}} €</h2>
                    <h3 class="">{{__('ui.description')}}</h3>
                    <p class="sottotitleevento">{{$article->description}}</p>
                </div>
            </div>
        </div> 
    </section>
    <!-- footer -->
    <x-footer></x-footer>
    
</x-layout>