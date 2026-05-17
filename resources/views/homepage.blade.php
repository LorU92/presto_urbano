<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">IN EVIDENZA</h1>
        <!-- annunci row -->
        <div class="row">

            {{-- Messaggio di successo creazione annuncio --}}
            @if (session('successCreateMessage'))
            <div class="alert alert-success">
                {{ session('successCreateMessage') }}
            </div>
            @endif

            {{-- Messaggio di errore accesso dashboard --}}
            @if (session('errorMessage'))
            <div class="alert alert-success">
                {{ session('errorMessage') }}
            </div>
            @endif

            {{-- Messaggio di successo invio mail per diventare revisore --}}
            @if (session('successMailMessage'))
            <div class="alert alert-success">
                {{ session('successMailMessage') }}
            </div>
            @endif
            
            <div class="linea"></div>

                @forelse ($articles as $article)
                <div class="container">
                    <div class="row">
                        <x-card :article="$article" />
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center sottotitleevento">ANCORA NESSUN ARTICOLO? </br> Non ti preoccupare arriveranno presto!</h3>
                    </div>
                </div>
            @endforelse

            </div>
        </section>
        <!-- footer -->
        <x-footer></x-footer>
        
    </x-layout>