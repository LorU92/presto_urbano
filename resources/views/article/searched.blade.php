<x-layout>

    <!-- cerca articoli -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.searchResults')}} <span>"{{$query}}"</span></h1>
        <div class="linea"></div>

            {{-- card articoli --}}
            @forelse ($articles as $article)
                <div class="container-fluid">
                    <div class="row">
                        <x-card :article="$article" />
                    </div>
                    @empty
                    {{-- messaggio se non ci sono articoli --}}
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>       
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div>
                            <h3 class="text-center sottotitleevento">{{__('ui.noResults')}}</h3>
                        </div>
                    </div>
                    @endforelse
                </div>

        {{-- metodo per generare le pagine da selezionare  --}}
        <div class="d-flex justify-content-center">
            <div>
                {{$articles->links()}}
            </div>
        </div>

    </section>
    
    <!-- footer -->
    <x-footer></x-footer>
        
    </x-layout>