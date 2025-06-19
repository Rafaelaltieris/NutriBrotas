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
        Schema::table('refeicaos', function (Blueprint $table) {
            $table->dropColumn('tipo'); // remove o campo tipo
        });
    }

    public function down()
    {
        Schema::table('refeicaos', function (Blueprint $table) {
            $table->dropColumn('nome'); // remove o campo nome
            $table->string('tipo')->after('id'); // adiciona o campo tipo novamente
        });
    }
};
