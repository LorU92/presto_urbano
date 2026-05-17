<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // colonna tabella articles per indicare se l'articolo è stato accettato o meno - accettare dati booleani
            // nullable() - nel caso sono presenti articoli gia presenti nel database prendono null
            $table->boolean('is_accepted')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('is_accepted');
        });
    }
};
