<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('jenis',6);
            $table->string('tahun',4);
            $table->date('start');
            $table->date('end');
        });
    }
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}
