<x-layout>

    <!-- pagina articoli -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.articles')}}</h1>
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
                            <h3 class="text-center sottotitleevento">{{__('ui.noArticlesyet')}} </br> {{__('ui.dontWorry')}}</h3>
                        </div>
                    </div>
                </div>
            @endforelse
            
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