<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Kertaskerja;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Kertaskerja::class, function (Faker $faker) {
    return [
        'nama_kertaskerja' => 'Kertas Kerja Unej',
        'no_buku' => rand(1,100),
        'no_spj' => rand(1,100),
        'tanggal_buku' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        'tanggal_spj' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        'keterangan' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'nilai_transaksi' => rand(5000, 10000),
        'pajak_audite' => rand(200, 500),
        'temuan_pajak' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'ssp' => '1',
        'kesesuaian_ppn' => rand(1,3),
        'kesesuaian_pph' => rand(1,3),
        'keterlambatan_penyetoran' => rand(1,3),
        'kuitansi' => '1',
        'surat_sk' => '1',
        'kelengkapan_ttd' => '2',
        'daftar_hadir_peserta' => '1',
        'kesesuaian_sbu' => '1',
        'kesesuaian_mak' => '1',
        'kesesuaian_laporan_kegiatan' => '1',
        'temuan' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'deskripsi' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'ditulis_dtm' => '1',
        'npwp' => '1',
        'kodepajak_id' => rand(1,5),
        'golongan_id' => rand(1,5),
        'created_by_uid' => '1',
        'unitkerja_id' => 1,
        'created_at' => now()
    ];
});
