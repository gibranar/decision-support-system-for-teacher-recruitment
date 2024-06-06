<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cagur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('telp');
            $table->string('Pendidikan');
            $table->string('IPK');
            $table->string('Umur');
            $table->string('Psikotes');
            $table->string('Pengalaman_Mengajar');
            $table->string('Sertifikasi_Keahlian');
            $table->timestamps();
        });

        Schema::create('kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->enum('jenis', ['Core Factor', 'Secondary Factor']);
            $table->timestamps();
        });

        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_k')->unsigned();
            $table->string('desc');
            $table->tinyInteger('nilai');
            $table->boolean('selected');
            $table->timestamps();

            $table->foreign('id_k')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('ideal_profil', function (Blueprint $table) {
            $table->increments('id'); // Ensure that `id` is a primary key
            $table->integer('id_k')->unsigned();
            $table->integer('id_sk')->unsigned();
            $table->integer('nilai_ideal')->unsigned();
            $table->timestamps();

            $table->foreign('id_k')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sk')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['id_k', 'id_sk']);
        });

        Schema::create('nilai_profil', function (Blueprint $table) {
            $table->integer('id_cagur')->unsigned();
            $table->integer('id_k')->unsigned();
            $table->integer('id_sk')->unsigned();
            $table->integer('nilai_profil')->unsigned();
            $table->timestamps();

            $table->foreign('id_cagur')->references('id')->on('cagur')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_k')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sk')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_cagur', 'id_k', 'id_sk']);
        });

        Schema::create('perhitungan', function (Blueprint $table) {
            $table->integer('id_cagur')->unsigned();
            $table->integer('id_sk')->unsigned();
            $table->integer('ideal_profil')->unsigned();
            $table->integer('gap');
            $table->integer('bobot_gap');
            $table->decimal('jumlah_nilai');
            $table->decimal('rata_rata');
            $table->decimal('total_nilai');
            $table->timestamps();

            $table->foreign('id_cagur')->references('id_cagur')->on('nilai_profil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sk')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ideal_profil')->references('id')->on('ideal_profil')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_cagur', 'id_sk']);
        });

        Schema::create('ranking', function (Blueprint $table) {
            $table->integer('id_cagur')->unsigned();
            $table->integer('total_nilai');
            $table->tinyInteger('rank');
            $table->timestamps();

            $table->foreign('id_cagur')->references('id_cagur')->on('nilai_profil')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_cagur']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perhitungan', function (Blueprint $table) {
            $table->dropForeign(['id_cagur']);
            $table->dropForeign(['id_sk']);
        });

        Schema::table('nilai_profil', function (Blueprint $table) {
            $table->dropForeign(['id_cagur']);
            $table->dropForeign(['id_sk']);
        });

        Schema::table('sub_kriteria', function (Blueprint $table) {
            $table->dropForeign(['id_k']);
        });

        Schema::dropIfExists('nilai_profil');
        Schema::dropIfExists('sub_kriteria');
        Schema::dropIfExists('kriteria');
        Schema::dropIfExists('cagur');
        Schema::dropIfExists('perhitungan');
    }
}
