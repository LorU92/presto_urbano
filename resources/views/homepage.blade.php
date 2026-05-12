<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">IN EVIDENZA</h1>
        <!-- annunci row -->
        <div class="row">

            {{-- Messaggio di successo creazione annuncio --}}
            @if (session('succesMessage'))
            <div class="alert alert-success">
                {{ session('succesMessage') }}
            </div>
            @endif
            
            <div class="linea"></div>
            {{-- <div class="col-12 col-md-6 eventotitle-custom">
                <h1 class="titleevento">Titolo annuncio</h1>
                <h3 class="sottotitleevento">SOTTOTITOLO ANNUNCIO</h3>
                <button class="button-news">
                    <a href="#" ><h4>LEGGI TUTTO<h4></a>
                    </button>
                </div>
                <div class="col-12 col-md-6 eventotext-custom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
               
                <div class="linea"></div> --}}
            </div>
        </section>
        <!-- footer -->
        <x-footer></x-footer>
        
    </x-layout>