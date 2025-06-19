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
            $table->string('nome')->after('id');
        });
    }

    public function down()
    {
        Schema::table('refeicaos', function (Blueprint $table) {
            $table->dropColumn('nome');
        });
    }
};
