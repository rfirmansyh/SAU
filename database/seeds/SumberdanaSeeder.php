<?php

use Illuminate\Database\Seeder;

class SumberdanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sumberdanas = [];

        $sumberdanas[] = [
            'name' => 'PNPB',
            'created_at' => now()
        ];
        $sumberdanas[] = [
            'name' => 'BOPTN',
            'created_at' => now()
        ];
        $sumberdanas[] = [
            'name' => 'RUPIAH MURNI',
            'created_at' => now()
        ];
        $sumberdanas[] = [
            'name' => 'SEMUA SUMBERDANA',
            'created_at' => now()
        ];
        $sumberdanas[] = [
            'name' => 'SUMBERDANA LAINNYA',
            'created_at' => now()
        ];
        DB::table('sumberdanas')->insert($sumberdanas);
        $this->command->info("Data Dummy Category berhasil diinsert");
    }
}
