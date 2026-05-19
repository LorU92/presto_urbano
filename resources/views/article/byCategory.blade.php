<x-layout>

    <!-- pagina categoria -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__("ui.$category->name")}}</h1>
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
                            <h3 class="text-center sottotitleevento">{{__('ui.noArticlesyet')}} </br> {{__('ui.dontWorry')}}</h3>
                        </div>
                        @auth
                        <button class="button-news my-3 p-2">
                            <a href="{{route('create.article')}}"><h4>{{__('ui.publishArticle')}}<h4></a>
                        </button>
                        @endauth
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