<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RepresentativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representative', function (Blueprint $table) {
            $table->id();
            $table->string('name',500)->nullable();
            $table->string('user_name',500)->nullable();
            $table->string('phone',500)->nullable();
            $table->string('password',500)->nullable();
            $table->string('photo',500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representative');

    }
}
