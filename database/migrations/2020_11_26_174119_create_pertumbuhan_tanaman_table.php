<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertumbuhanTanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertumbuhan_tanaman', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_penanaman');
            $table->integer('suhu_ruangan');
            $table->string('nutrisi',20);
            $table->string('jenis_tanaman',20);
            $table->integer('id_penjual');            
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
        Schema::dropIfExists('pertumbuhan_tanaman');
    }
}
