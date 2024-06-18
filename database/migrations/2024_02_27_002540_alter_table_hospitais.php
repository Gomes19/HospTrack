<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //
        DB::statement('ALTER TABLE hospitais ADD FULLTEXT INDEX idx_nome_fulltext (nome)');
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('ALTER TABLE hospitais DROP INDEX idx_nome_fulltext');

    }
};
