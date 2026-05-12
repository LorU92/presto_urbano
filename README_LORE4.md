# Relazione One to Many
    (RDBMS) RELATIONAL DATABASE MANGEMENT SYSTEM
        - Sistema che gestisce i database relazionali tra loro
        - Non inserire informazioni ripetute per far comunicare piu record in table differenti 
        esempio record user Utente1 -> record tabella prodotti

        Esistono 3 tipi di relazione
        1. Relazione One to One -> 
            un entità di una tabella collegata ad un'altra entità di un altra tabella (entità= riga (record))

        2. Relazione One to Many ->
            una'entità può essere collegata a più entità di un'altra tabella 

        COLLEGARE LE TABELLE NEL DB
            - inserire nella tabella figlia una colonna id del genitore (user_id) - sintassi specifica per laravel - Foreign Key (chiave esterna)

            - per inserire la colonna bisogna aggiungere una migrazione per aggiungere la FK all'interno della tabella child della relazione One to Many.
                - la tabella child è quella che definisce la parte "Many" della relazione

                php artisan make:migration add_user_id_column_to_products_table

            Migrations up()
            1. Nella migrazione bisogna fare attenzione perché una tabella relazionale può avere solo un id.
            Ricordo che l'id è un numero intero senza segno
            Quindi possiamo creare una colonna con all'interno un tipo di dato intero molto grande senza segno. Solo positivi.

                $table->unsignedBigInteger();

            2. prendere questo valore e comunicarli che è un foreign Key (chiave esterna)-> indicare a cosa fa riferimento ('colonna')->on('tabella')

                $table->foreign('user_id')->references('id')->on('users')->nullable();
                
                nullable() - nel caso sono presenti prodotti già presenti nel database prendono null

                questi metodi definiscono la foreign key della tabella products collegata alla tabella users tramite i loro id specifici

                leggendola al contrario è più semplice sulla tabella users recupero l'id che fa collegamento con la chiave esterna user_id

                in definitiva:
                1. creo la colonna
                2. definisco la colonna foreign key (vincolo referenziale) attraverso questo collegamento:

                la chiave esterna (tabella user_id) -> riferimento ad un id ->on di una determinata tabella


            link da seguire: 
            https://laravel.com/docs/13.x/migrations#foreign-key-constraints


            Migration down()
                Bisogna ragionare a partire dall'ultima operazione dell'up a salire.
                L'ultima operazione è definire la foreign key - vincolo referenziale

                Quindi devo prima rompere il vincolo referenziale e poi rompere la colonna

                $table->dropForeign(['user_id'])
                    sto rompendo il vincolo referenziale in modo da isolare la colonna dalla tabella e poi la elimino.

                    dropForeign(['accetta array']);

            Model 
                - dopo i migration bisogna relazionare i model tra di loro (dobbiamo istruirli) 

                    -interazione one to many e poi anche many to one
                    - l'interazione non è unidirezionale ma bidirezionale e quindi dobbiamo istruire il model genitore e poi quello del figlio

                Model genitore
                    ONE TO MANY
                    https://laravel.com/docs/11.x/eloquent-relationships#one-to-one

                    products - al plurale perché più prodotti collegati ad un user

                    public function products(){
                        return $this->hasMany(Product::class);
                    }
                
                        // richiamiamo il modello Product e ci ritorna tutti i prodotti collegati a quell'utente

                            TRAVERSAL MODEL 
                            - attraversamento del modello - 

                            // questo procedimento fornisce la relazione che possiamo sfruttare i products anche nelle view del figlio. 
                            // Ci fornisce le istanze del model products() ma anche le proprietà dei products (collection). Quindi:

                            - collezione proprietà dei prodotti collegati quindi foreach per arrivare al singolo prodotto e alle sue singole proprietà

                            @foreach($user->products as $product)
                                <p>{{$product->title }}</p>
                            @endforeach

                Model figlio
                    One to Many(Inverse)

                    user - al singolare perché ogni prodotto avrà un solo utente collegato
                    
                    public function user(){
                        return $this->belongsTo(User::class);
                    }             

                        // questo metodo ci indica che quando richiamiamo il metodo user() ci ritorna l'utente collegato al prodotto

                            TRAVERSAL MODEL 
                            - attraversamento del modello - 

                            // questo procedimento fornisce la relazione che possiamo sfruttare user anche nelle view del figlio. 
                            // Ci fornisce il metodo user() ma anche la proprietà dell'user in modo da utilizzare i suoi attributi:

                                <!-- dell'oggetto prodotto prendi l'user collegato e la sua proprietà nome  -->
                            <p class="card-text">Creato da {{$product->user->name}}</p>


                Model figlio-fillable
                   Istruiti i migration e model interveniamo sul fillable del model figlio per comunicare che dovrà accettare un altra colonna ovvero 'user_id'

                Controller figlio
                    Istruire il MASS ASSIGNMENT che deve valorizzare la colonna con l'id dell'utente. Sfruttiamo Auth.

                        'user_id' => Auth::user()->id
                        mi ritorna l'id dell'utente registrato perché solo chi è autenticato può fare lo store