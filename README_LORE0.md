<!-- LARAVEL DATABASE - INTRODUZIONE -->

<!-- DATABASE -->
    <!-- magazzino o collezione con delle strutture atte a contenere dei dati. Esistono e tipi di tipologie -->

    <!-- DATABASE RELAZIONALI (SQL) -->
        <!-- hanno una struttura a righe c colonne -->
        <!-- SQLite, MySQL, OracleDB, PostgreSQL, Aurora (AWS) -->


    <!-- DATABASE NON RELAZIONALI (NoSQL - Not Only SQL)  -->
        <!-- ha una struttura basata su documenti mutevoli (struttura dinamica) -->
        <!-- sono strutturati tipo JSON  -->
        <!-- MongoDB, Firebase, DynamoBD (AWS), ... -->


    <!-- DATABASE RELAZIONALI -->
    <!-- MysQL => RDBMS (Relational DataBase Management System) -->
        <!-- Gestori di Database quindi dei software che ci permettono di creare e modificare i database -->

    <!-- TABELLE -->
        <!-- tabelle strutturate in righe e colonne per definire i nostri dati -->
         <!-- Le righe sono definite => Record -> definisce le informazioni complete di una determinata entità (oggetto) -->
         <!-- le colonne sono definite => Field (Campi) -> singola informazione di una determinata entità (oggetto)  -->

    <!-- id -> identificatore univoco che permette di catturare una specifica entità (oggetto) -->
        <!-- definito tramite un numero intero senza segnoo e auto-incrementale -->


        <!-- come comunico con il database? -->
         <!-- SQL (Structured Query Language) -->
         <!-- scriveremo query SQL attraverso PHP -->
         <!-- Laravel ha un servizio che permette di tradurre il linguaggio PHP in query SQL => ELOQUENT -->
         <!-- ELOQUENT => ORM (Object Relational Mapper) -->

         <!-- crea un punto di collegamento di comunicazione - una sorta di intermediario tra nostra applicazione Laravel e il Database -->


    <!-- COMANDI -->
    <!-- lancio mysql (windows per mac senza winpty) -->
        <!-- winpty mysql -u root -p -->
    <!-- mostrare tutti i databases -->
        <!-- show databases; -->
    <!-- creare nuovi database -->
        <!--  create database nomedatabase; -->
    <!-- accedere al database -->
        <!-- use nomedatabase; -->
    <!-- vedere le strutture al suo interno -->
        <!-- show tables; -->

    <!-- dopo aver creato il database lavoreremo in Laraval -->
        <!-- quit -->

        <!-- TablePlus -->
            <!-- GUI (Graphic User Interface) -->
             <!-- interfaccia per visualizzare i dati del database ma non lo utilizzaeremo per creare database -->