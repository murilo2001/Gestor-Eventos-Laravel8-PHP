<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToEventosTable extends Migration
{
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->string('image');
        });
    }

    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
