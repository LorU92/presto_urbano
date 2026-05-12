# Livewire

    - Insieme di funzioni/funzionalità. E' un framework da installare dentro Laravel (come bootstrap)
    - Inserire dinamicità al backend senza uscire dall'ambiente di PHP (non utilizzando JS)
    - Livewire lavora con i componenti

    - Framework per creare delle UI (User Interface) reattive rimandendo nel linguaggio PHP 

    INSTALLAZIONE LIVEWIRE
        - comando di lancio per versione 4
        composer require livewire/livewire 

        - comando lancio per versione 3
        composer update livewire/livewire --with-all-dependencies

        Inserire questa stringa in composer.json in "require"
        "livewire/livewire": "^3.0"


    CREAZIONE DI UN COMPONENTE
        php artisan make:livewire nomevista

            - lanciamo per creare due file:
            1.app/Livewire/Counter.php  // classe
            2.resources/views/livewire/counter.blade.php  //vista

            Tutto ciò che definiamo nella classe è collegato alla vista.
            Spostiamo la logica dei controller all'interno della vista in maniera dinamica

    TAG PER RICHIAMARE UN COMPONENTE
        <livewire:nome-componente />

    
    CREIAMO LA MIGRAZIONE E MODEL ARTICLE
        php artisan make:model Article -m

    ISTRUIAMO - MIGGRAZIONE , MODEL , CONTROLLER E VIEW
        wire:model - collego degli attributi
        wire:click - al click richiama fuznione
        wire:submit - collego un action (un azione)
        wire:model.live - stampa l'errore in live mentre si compila il campo
        wire:model.blur - stampa l'errore in qunando cambio l'input compilato
        wire:model.live.debounce.150ms - stampa l'errore con un tempo definito dopo la fine della compilazione

    !!
        Per le rotte bisogna utilizzare i controller di Laravel in quanto quelli di Livewire si rifesriscono ai componenti all'interno delle view. 

        Per visualizzare e utilizzare i dati in una determinata vista bisogno salvarli in un attributo all'interno del relativo componente Livewire. Un pò come facevamo per i controller standard prima. 

    LAVORIAMO SULLE CRUD CON LIVEWIRE

        Funzione mount() - sostituisce il costrutture per valorizzare i campi

        - EDIT
        - SHOW
        - UPDATE
        - DELETE
