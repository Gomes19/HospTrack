<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


    /*
   +-----------------------------+
   |    Cargos Hospital Users    |
   |                             |
   | 0- Admin                    |
   | 1- Marca Ponto              |
   |                             |
   +-----------------------------+                               
   */
    public function up(): void
    {
        Schema::create('user_hospitais', function (Blueprint $table) {
            $table->id();
            $table->integer('cargo');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users') 
                    ->onDelete('CASCADE') 
                    ->onUpdate('CASCADE');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')
                    ->references('id')
                    ->on('hospitais') 
                    ->onDelete('CASCADE') 
                    ->onUpdate('CASCADE');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_hospitais');
    }
};
