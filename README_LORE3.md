# FORTIFY

 - E' un pacchetto (libreria - insieme di funzioni e logiche) first pary di Laravel (specifico per Laravel) e serve a gestire l'autentificazione

    - Per autentificazione intendiamo un sistema di accesso e registrazione al nostro sito

    INSTALLAZIONE
    - Installazione -> seguiremo tutti i procedimenti (https://laravel.com/docs/13.x/fortify#main-content)
        0. disattivare avast antivirus
        
        1. composer require laravel/fortify
        -installazione delle dipendenze di php
        2. php artisan fortify:install
            - abbiamo reso disponibili al nostro progetto dei file di configurazione e delle logiche di Fortify per poter effettuare delle modifiche al composrtamentod di base di Fortify:
                - app/action
                - providers-> nuovo file
                - config ->nuovo file
                - database/migrations ->nuova migrazione integrando delle colonne a users
        - lancia la migrazione e quindi aggiorniamo il database
        3. php artisan migrate

    Comando per vedere tutte le rotte
    - php artisan route:list

    REGISTRAZIONE
    - Andiamo a definire nel fortifyServiceProvider la logica per poter visualizzare il form di registrazione
    - Copiamo la logica di questo link (https://laravel.com/docs/13.x/fortify#registration)
    - Creiamo in views la cartella auth con dentro il file register.blade.php
    - Utiliziamo il comando per vedere tutte le rotte (php artisan route:list) per vedere le rotte del nostro progetto e recuperare quelle di Fortify GET e POST di register

    - modifichiamo il form di registrazione secondo le indicazioni di registrazione di Laravel
    - per reindirizzare al click del button "registra" andare in config/fortify e cambiare HOME PATCH: 'home' => 'percorso view', 

    -LOGOUT
    - creiamo un tasto logout in modo che l'utente in sessione vien slogatto.
        - attraverso la rotta logout (POST) fornita da fortify
        - creiamo il tasto logout utilizzando il tag form

    -ACCESSO/LOGIN
    - Andiamo a definire nel fortifyServiceProvider la logica per poter visualizzare il form di accesso
    - Copiamo la logica di questo link (https://laravel.com/docs/13.x/fortify#authentication)
    - Creiamo in views la cartella auth con dentro il file login.blade.php

        Passaggio successivo:
        -in navbar gestire i tasti login/logout/registati e crea prodotto visibile o meno
        @auth/@endauth - @guest/@endguest

# Middlewar
    - logiche che io scelgo di interpretare a determinate richieste
        - 'auth' - alias middleware che controlla se l'utente è autenticato
            - il middleware controlla le rotte che vogliamo siano navigabili solo all'utente autenticato
            ->Middleware('auth');
        

# CRUD

C -> Create
R -> Read
U -> Update
D -> Delete

- 4 operazioni di base che si possono effettuare in un Database

# Ceate  
    comdando importante
    php artisan make:model Nomemodello -mcr
    - creami il modello, la migrazione, controller associato e le risorse del controller 

1. Scriviamo la migrazione con la struttura della nostra tabella
2. definiamo nel model i fillable
3. popoliamo il controller Article in cui inseriamo in:
    - index
        return view con parametro da portare con se ovvero tutti gli articoli (prima raccolti in una variabile in quanto possiamo passare solo un valore e quindi passiamo un array con compact)
    - create
        inseriamo il return della view create (form)
    - store (dati da passare a database)
        - inseriamo in variabili i dati del form create
        - valorizziamo i dati del model con le variabili precedenti che catturano i dati del form il tutto inserito in una variabile
    - show 
        - restituiamo una view con parametro (variabile di mass assignment).


# Update
    rotta
    -creare la rotta parametria per edit perché si deve portare dietro il parametro articoli
    
    view
    - creare un form precompialto con i dati dell'articolo che vogliamo aggiornare

    controller (edit)
    - inserire return con parametro da portare dietro (gli articoli) utilizzando compact in modo da portare l'array degli articoli. 

    view
    - successivamente apportare le modifiche al form come indicato in edit.blade.php (principalmente inserire).
    - importante per far visualizzare l'articolo da modificare nei relativi campi valorizzare value="{{$article->proprietà}}"

    - la modifica al nostro database viene effettuata dalla rotta update da inserire in action

    - l'operazione di update è di tipo POST ma il metodo PUT indica che nel momento che la richiesta arriva al server è solo una modifica e non una creazione. Ti mando una richiesta POST ma nello specifico PUT. perché i form accettano solo GET e POST. Attraverso direttiva  @method('PUT') - override del metodo. Stiamo sovrascrivendo il metodo originale POST - facciamo lo Spoofing

    web
    - ritorniamo nel web e creiamo la rotta update con metodo non post ma put portando con noi nella rotta anche article ovvero porterà con se l'articolo (quindi rotta parametrica). Per questo motivo Inserire l'articolo anche nell'action del form in modo che quando si clicca su carica articolo (dentro edit) si porta con se l'articolo. (compact('article')

    controller
    - andiamo in controller nella classe update 
        - scrivere la logica - l'articolo deve essere modificato con la classe della request
        - scritta la logica di update dell'articolo facciamo return su vista index con messaggio dedicato

# Delete
    - creiamo un buttone per eliminare in index. Operazione simil POST ovvero @method('DELETE') ma il tag anchor non prende oltre il GET e quindi dobbiamo utilizzare il tag FORM

    - impostiamo la rotta
    - impostiamo il metodo delete in controller