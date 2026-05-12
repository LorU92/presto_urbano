# Relazioni Many to Many | N - N
    - creare una terza colonna che si interppone tra le due tabelle per gestire i loro connessioni. Tabella Pivot
    - la tabella Pivot è quello di costruite due relazioni one to many con genitore Pivot E figli Articoli e Tags (one to many bilaterale)

    TABELLA TAG

    CREAZIONE DEI MODELLI
    - creiamo la tabella tag in modo da crearmi solo model e migration
        php artisan make:model Tag -m
        php artisan make:model Article -m

    1. ci creiamo due modelli da mettere in relazione N - N

    2. creare la migrazione per i modelli 
        php artisan make:model Tag -m
        php artisan make:model Article -m
    
    CREAZIONE DELLA MIGRAZIONE

    3. creare la migrazione per la tabella pivot
        inserire create_ poi i modelli da collegare in ordine alfabetico al singolare_table

        php artisan make:migration create_article_tag_table

    ISTRUIAMO LA MIGRAZIONE
    4. Inserisco nella migrazione le due Foreign Key

    ISTRUIAMO I MODELLI
    5. istruire i modelli alla relazione Many to Many ovvero dobbiamo relazionarli con il pivot.

    CONTROLLER (CREATE) - METODO (ATTACH())
    6.per rendere disponibile i tag in una view dobbiamo intervenire nel controller relativo della view ovvero recupero tutti i tag con Tag::all(); e salvo in una variabile in modo che possa passare quest'ultima alla vista attraverso compact

    VIEW
    7.passiamo nella view e facciamo un @foreach in quanto per ogni tag fai qualcosa in questo caso mostra il valore di ogni colonna nome

    SALVATAGGIO 
    8. come salviamo nel db? attraverso il metodo store del controller sfruttando l'attributo name con valore dei tags selezionati. Quindi un array di tags "tags[]" e inserendo come valore di value l'id del tag in modo da passarlo nel controller metodo store() per salvare nel db
 
    Quindi quando viene creato l'articolo i relativi tag vengono salvati nella tabella pivot


    CONTROLLER (EDIT) 
    CONTROLLER (STORE) - METODO (ATTACH())  
    CONTROLLER (UPDATE) - METODO (SINC())    
    CONTROLLER (DESTROY) - METODO (DEATACH())







    !!!!
       // devo leggere qualcosa nel database esempio:

        $product->user->name 
        
        $product → un oggetto del model Product
        ->user → Laravel usa la relazione user() definita nel model Product e recupera il record collegato di User
        ->name → leggi il campo name di quell’utente

        parto da un oggetto, attraverso la relazione raggiungo il model collegato, e da lì leggo l’informazione che mi serve.

        //devo scrivere qualcosa nel batabase
    
        