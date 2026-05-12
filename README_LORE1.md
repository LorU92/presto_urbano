
// PROCEDIMENTI 

// SPEDIRE MAIL
// procedimento:
    // 1. creare route di richiesta utente POST 
    // 2. creare view form con name="", in form -> method="GET o POST", action="rotta" - @csrf ricordati
    // 3. creare controller e recupero i dati dal form salvandoli in una variabile Request (php artisan make:controller nomecontroller)
    // 4. creare mail (php artisan make:mail ContactMail) in cui creare delle variabili pubbliche con relativa chiave, procedere con il costruttore per attribuire il valore alle variabili pubbliche con i dati inseriti dall'utente in questo modo posso utilizzare tali dati nella view mail
    // 5. a quel punto nel controller spediamo la mail to(email inserita dall'utente) e crea un oggetto con gli attributi del form da passere al costruttore della contactMail

// quindi il flusso diventa
// ROUTE -> FORM -> REQUEST -> CONTROLLER -> MAIL CLASS -> INVIO MAIL -> pagina thank you


// MODELLI E MIGRAZIONE
// procedimento:
    // 0. modificare i dati del database su .env
    // 1. crea la migrazione ovvero table con i dati del form
    // 2. crea il model con i dati di quella tabella per lavorare in laravel
    // 3. a quel punto si torna in controller e recupero i dati dal form salvandoli in una variabile Request
    // 4. salvi i dati nel model in questo caso Product - MASS ASSIGNMENT - valorizzando le chiavi messe a disposizione dal modello che sono quelli delle colonne della tabella e attribuisco i valori ovvero le variabili in cui ho salvato i dati che ha inserito l'utente.
    // 5. utilizzo i dati del db in una view attraverso l'inserimento di tutti i dati in una variabile che verrà messa a disposizione dal return view. (può passare solo un dato ecco perché ci serve la variabile)

// Quindi il flusso diventa
// FORM -> REQUEST -> SALVATAGGIO SU DB -> INVIO MAIL -> pagina thank you


// STORAGE 
// procedimento:
    // 0. inserire nuova colonna nella migrazione già creata (php artisan make:migration add_img_column_to_products_table) in questo modo creiamo colonna img
    // 1. nell nuovo file migrazione migriamo la colonna indicando la posizione rispetto alle altre colonne e soprattutto per img deve accettare anche valori nulli 
    // 2. nella view di riferimento inseriamo nel form il campo "immagine" con type=file e inseriamo in form (enctype="multipart/form-data") in modo da catturare non solo stringhe ma anche dati complessi come file
    // 3. salvare in una variabile i dati del form tramite $request in questo caso l'upload di img -> metodo file('valore di name dell'input)-> metodo store('percorso dentro progetto per salvare i file) (metodo di laravel per salvare i file)
    // 4. istruiamo il fillable del model inserendo la colonna di riferimento aggiuntiva in questo caso 'img' 
    // 5. successivamente istruiamo il MASS ASIGNMENT - valorizzando le chiavi messe a disposizione dal modello che sono quelli delle colonne della tabella e attribuisco i valori ovvero le variabili in cui ho salvato i dati che ha inserito l'utente.
    // 6. per visualizzare l'immagine o video bisogna clonare la cartella storage/public in public in modo da essere pubblica.
        php artisan storage:link


// VALIDATION
// procedimento:
    // 0. se ci sono immagini fare un if con parametro se insriesce l'immagine entra e attribuisci il valore a $img. altrimenti impostiamo il valore di $img = null - in mo che se non carichi nulla non darà errore.
    // 1. creo una classe Request custom per inserire i vincoli di validazione (php artisan make:request ProductRequest)
    // 2. al suo interno 
        // 2.1 metodo authorize() -> return da falsa a true
        // 2.2 metodo rules() -> regole -> array "chiave" -> valore 
                //chiave - sarà il campo input da validare
                //valore - la regola che vuoi validare 'required'
    // 3. modificare Request in controller con ProductRequest 

    // 4. come comunicachiamo l'errore all'utente? attraverso Displaying Validation Errors di Laravel - codice da copiare nella view
    // 4.1 se inserimento corretto:
        return redirect()->back()->with('message', 'messaggio da visualizzare');
        // ritorna nella pagina precedente in cui stavi e se il prodotto viene inserito esce un avviso con prodotto inserito -> andare nella view e copiare il codice di laravel - Redirecting With Flashed Session Data