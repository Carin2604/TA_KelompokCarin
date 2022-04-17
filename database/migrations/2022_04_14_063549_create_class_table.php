<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string('tingkatan');
            $table->string('ruang');
        });
    }
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
