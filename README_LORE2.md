- git remote remove origin
    - comando per rimuovere l'attuale origine del progetto e poterlo associare ad una nuova repository

- clone progetto
    - cp .env.example .env
    - composer i
    - andiamo a modificare il .env per aggiornare i dati relativi al database
    - php artisan key:gen (chiave APP_KEY in .env)
    - php artisan migrate -> lancia le migrazioni che creano le tabelle nel nostro database
    - npm i -> installa le dipendenenze di js

- STORAGE
    - memoria adibita a contenere i media del nostro progetto
    - possono contenere video e immagini 

    - storage locale
        - lo stesso framework mantiene i dati nella cartella storage
    - storage esterno
        - servizi esterni - servizio famoso è S3 di AWS


Inserire colonna img in una table in questo caso products
    php artisan make:migration add_img_column_to_products_table

Link simbolico della cartella storage in public in modo da rendere disponibile alla view
    php artisan storage:link

- VALIDATION

Crea una nuova classe Request che può essere castomizzata
    php artisan make:request ProductRequest

    lista errori
    https://laravel.com/docs/11.x/validation#available-validation-rules