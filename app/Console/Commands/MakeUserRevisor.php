<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\User;

#[Signature('app:make-user-revisor {email}')]
#[Description('Registra un utente come revisore')]
class MakeUserRevisor extends Command
{
    /**
     * Execute the console command.
     */
    // comando che partirà con il comando php artisan app:make-user-revisor
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("Utente {$user->name} è stato registrato come revisore");
    }

    // 1. prendi email user con comando php artisan app:make-user-revisor "emai utente"
    // 2. cerca email nel db
    // 3. se trova l'utente lo rende revisore e lo salva altrimenti stampa errore
    // 4. stampa messaggio
}
