<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePetugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_petugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_petugas',20);
            $table->string('alamat',100);
            $table->string('nomer_telepon',20);
            $table->string('username',20);
            $table->integer('password');
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
        Schema::dropIfExists('table_petugas');
    }
}
