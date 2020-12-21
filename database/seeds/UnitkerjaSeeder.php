<?php

use Illuminate\Database\Seeder;

class UnitkerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitkerjas = [];

        $unitkerjas[] = [
            'name' => 'Ilmu Komputer',
            'photo' => null,
            'description' => 'Unit Kerja Fakultas Ilmu Komputer',
            'sumberdana_id' => 1,
            'created_at' => now()
        ];
        DB::table('unitkerjas')->insert($unitkerjas);
        $this->command->info("Data Dummy Unit Kerja berhasil diinsert");
    }
}
