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
    Schema::table('kelas', function (Blueprint $table) {
        $table->string('wali_kelas')->nullable()->change(); // Menjadikan kolom nullable
    });
}

public function down()
{
    Schema::table('kelas', function (Blueprint $table) {
        $table->string('wali_kelas')->nullable(false)->change(); // Mengembalikan ke kondisi sebelumnya
    });
}

};
