<?php

use Illuminate\Database\Seeder;

class KeterlambatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keterlambatans = [];

        $keterlambatans[] = [
            'name' => 'PPN',
            'created_at' => now()
        ];
        $keterlambatans[] = [
            'name' => 'PPh',
            'created_at' => now()
        ];
        $keterlambatans[] = [
            'name' => 'PPN & PPh',
            'created_at' => now()
        ];
        DB::table('keterlambatans')->insert($keterlambatans);
        $this->command->info("Data Dummy Category berhasil diinsert");
    }
}
