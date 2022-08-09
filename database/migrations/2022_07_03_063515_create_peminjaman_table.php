<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nm_peminjam');
            $table->string('no_telp');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('status');
            $table->string('BaPeminjaman');
            $table->string('BaPengembalian');
            $table->string('suratPengajuan');
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
        Schema::dropIfExists('peminjamen');
    }
};
