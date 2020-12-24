<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKertaskerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kertaskerjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kertaskerja');
            $table->bigInteger('no_buku');
            $table->bigInteger('no_spj');
            $table->timestamp('tanggal_buku')->useCurrent();
            $table->timestamp('tanggal_spj')->useCurrent();
            $table->text('keterangan')->nullable();
            $table->bigInteger('nilai_transaksi');
            $table->bigInteger('pajak_audite')->nullable();
            $table->text('temuan_pajak')->nullable()->comment = 'Generate otomatis';
            $table->enum('ssp', ['1', '0'])->comment = '1 = Ada, 0 = Tidak Ada';
            $table->unsignedBigInteger('kesesuaian_ppn');
            $table->unsignedBigInteger('kesesuaian_pph');
            $table->unsignedBigInteger('keterlambatan_penyetoran');
            $table->enum('kuitansi', ['1', '0'])->comment = '1 = Ada, 0 = Tidak Ada';
            $table->enum('surat_sk', ['1', '0'])->comment = '1 = Ada, 0 = Tidak Ada';
            $table->enum('kelengkapan_ttd', ['1', '2', '3'])->comment = '1 = Lengkap, 2 = Kurang Lengkap, 3 = Tidak Lengkap';
            $table->enum('daftar_hadir_peserta', ['1', '0'])->comment = '1 = Ada, 0 = Tidak Ada';
            $table->enum('kesesuaian_sbu', ['1', '0'])->comment = '1 = Sesuai, 0 = Tidak Sesuai';
            $table->enum('kesesuaian_mak', ['1', '0'])->comment = '1 = Sesuai, 0 = Tidak Sesuai';
            $table->enum('kesesuaian_laporan_kegiatan', ['1', '0'])->comment = '1 = Sesuai, 0 = Tidak Sesuai';
            $table->text('temuan')->nullable()->comment = 'json_decode value';
            $table->text('deskripsi')->nullable();
            $table->enum('ditulis_dtm', ['1', '0'])->comment = '1 = V, 0 = X';
            $table->enum('npwp', ['1', '0'])->nullabe()->comment = '1 = Ada, 0 = Tidak Ada';
            $table->unsignedBigInteger('kodepajak_id')->nullable();
            $table->unsignedBigInteger('golongan_id')->nullable();
            $table->unsignedBigInteger('created_by_uid')->nullable();
            $table->unsignedBigInteger('unitkerja_id')->nullable();
            $table->timestamps();

            $table->foreign('kesesuaian_ppn')->references('id')->on('kesesuaians');
            $table->foreign('kesesuaian_pph')->references('id')->on('kesesuaians');
            $table->foreign('keterlambatan_penyetoran')->references('id')->on('keterlambatans');
            $table->foreign('created_by_uid')->references('id')->on('users');
            $table->foreign('unitkerja_id')->references('id')->on('unitkerjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kertaskerjas');
    }
}
