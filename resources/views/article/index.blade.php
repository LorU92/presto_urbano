<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.articles')}}</h1>
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
                            <h3 class="text-center sottotitleevento">{{__('ui.noArticlesyet')}} </br> {{__('ui.dontWorry')}}</h3>
                        </div>
                    </div>
                </div>
            @endforelse
        
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