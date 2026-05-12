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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('img')->nullable();
            $table->float('price', 8, 2);

            // RELAZIONE ONE TO MANY CON LA TABELLA CATEGORY
            $table->unsignedBigInteger('category_id')->nullable();
            // category_id riferimento dell'id all'interno della tabella categories - foreign key (vincolo referenziale)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); 
            // con onDelete('set null') se la categoria viene cancellata, il campo user_id nell'articolo sarà impostato a null

            // RELAZIONE ONE TO MANY CON LA TABELLA USERS
            $table->unsignedBigInteger('user_id')->nullable();
            // user_id riferimento dell'id all'interno della tabella users - foreign key (vincolo referenziale)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); 
            // con onDelete('set null') se l'user viene cancellata, il campo user_id nell'articolo sarà impostato a null

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
