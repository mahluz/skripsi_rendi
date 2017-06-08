<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id_masuk');
            $table->string('no_surat',20);
            $table->string('hal',25);
            $table->string('dari', 25);
            $table->string('kepada', 25);
            $table->string('isi');
            $table->string('tembusan', 30);
            $table->string('image_masuk');
            $table->timestamps('create_at');
        });
        Schema::create('surat_keluar', function(Blueprint $table){
            $table->increments('id_keluar');
            $table->integer('id_kategori');
            $table->integer('id_user');
            $table->string('nomor', 20);
            $table->string('dari', 25);
            $table->string('alamat',50);
            $table->string('keperluan');
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
        Schema::drop('surat_masuk');
        Schema::drop('surat_keluar');
    }
}
