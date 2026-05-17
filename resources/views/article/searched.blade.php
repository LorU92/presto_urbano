<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">RISULTATI RICERCA <span>"{{$query}}"</span></h1>
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
                            <h3 class="text-center sottotitleevento">NESSUN ARTICOLO TROVATO</h3>
                        </div>
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