<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users[] = [
            'name' => 'Rahmad Firmansyah',
            'email' => 'fsyah7052@gmail.com',
            'password' => bcrypt('123123'),
            'created_at' => now()
        ];
        DB::table('users')->insert($users);
        $this->command->info("Data Dummy Unit Kerja berhasil diinsert");
    }
}
