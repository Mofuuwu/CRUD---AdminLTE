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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id('id_siswa'); // ID Siswa
        $table->string('nama_siswa'); // Nama Siswa
        $table->string('nis')->unique(); // NIS (Nomor Induk Siswa)
        $table->date('tanggal_lahir'); // Tanggal Lahir
        $table->unsignedBigInteger('id_kelas'); // ID Kelas (Foreign Key)
        $table->timestamps(); // Timestamps (created_at, updated_at)

        // Foreign key relation to Kelas table
        $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('siswas');
}

};
