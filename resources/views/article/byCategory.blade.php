<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__("ui.$category->name")}}</h1>
        <!-- annunci row -->
        <div class="linea"></div>

            @forelse ($articles as $article)
                <div class="container-fluid">
                    <div class="row">
                        <x-card :article="$article" />
                    </div>
                    @empty
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
        <div class="d-flex justify-content-center">
            <div>
                {{-- metodo per generare le pagine da selezionare  --}}
                {{$articles->links()}}
            </div>
        </div>

    </section>
    <!-- footer -->
    <x-footer></x-footer>
        
    </x-layout>