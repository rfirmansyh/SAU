<?php

use Illuminate\Database\Seeder;

class KodetemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kode_temuans = [];

        $kode_temuans[] = [
            'kode' => '10103',
            'detail' => 'Kekurangan Volume Pekerjaan dan/atau Barang',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10107',
            'detail' => 'Pembayaran HR dan/atau biaya perjalanan dinas ganda',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10109',
            'detail' => 'Belanja tidak sesuai atau melebihi ketentuan',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10111',
            'detail' => 'Kelebihan penetapan dan pembayaran restitusi pajak atau kompensasi kerugian',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10114',
            'detail' => 'Entitas belum/tidak melaksanakan tuntutan pembendaharaan',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10305',
            'detail' => 'Pengenaan tarif pajak /PNBP lebih rendah dari ketentuan',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10401',
            'detail' => 'Pertanggungjawaban tidak akuntanble atau bukti tidak lengkap atau valid',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10407',
            'detail' => 'Penyimpangan terhadap peraturan perundang-undangan bidang tertentu',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10415',
            'detail' => 'Pengalihan anggaran antar MAK tidak sah',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '20101',
            'detail' => 'Pencatatan tidak/belum dilakukan/tidak akurat',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '30103',
            'detail' => 'Pemborosan keuangan negara/daerah/perusahaan/ kemahalan',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '30301',
            'detail' => 'Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10105',
            'detail' => 'Pemahalan harga (mark up)',
            'created_at' => now()
        ];
        $kode_temuans[] = [
            'kode' => '10410',
            'detail' => 'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas waktu yang ditentukan',
            'created_at' => now()
        ];
        DB::table('kode_temuans')->insert($kode_temuans);
        $this->command->info("Data Dummy Category berhasil diinsert");
    }
}
