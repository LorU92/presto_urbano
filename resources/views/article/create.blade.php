<x-layout>

    <!-- creare articolo -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.writeArticles')}}</h1>
        <div class="linea"></div>

            {{-- component livewire - creazione articolo --}}
            <livewire:create-article-form />
               
    </section>
    <!-- footer -->
    <x-footer></x-footer>
        
    </x-layout>