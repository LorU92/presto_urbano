<x-layout>

    <!-- section annunci -->
    <section class="container-fluid">
        <h1 class="evento-custom">{{__('ui.writeArticles')}}</h1>
        <!-- annunci row -->
        <div class="linea"></div>

            <livewire:create-article-form />
               
    </section>
    <!-- footer -->
    <x-footer></x-footer>
        
    </x-layout>