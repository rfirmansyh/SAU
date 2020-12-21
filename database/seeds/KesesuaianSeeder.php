<?php

use Illuminate\Database\Seeder;

class KesesuaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kesesuaians = [];

        $kesesuaians[] = [
            'name' => 'Nihil (sesuai)',
            'created_at' => now()
        ];
        $kesesuaians[] = [
            'name' => 'Kurang bayar',
            'created_at' => now()
        ];
        $kesesuaians[] = [
            'name' => 'Lebih bayar',
            'created_at' => now()
        ];
        DB::table('kesesuaians')->insert($kesesuaians);
        $this->command->info("Data Dummy Category berhasil diinsert");
    }
}
