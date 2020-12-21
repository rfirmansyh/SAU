<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call("UserSeeder");
        $this->call("SumberdanaSeeder");
        $this->call("KodetemuanSeeder");
        $this->call("KesesuaianSeeder");
        $this->call("KeterlambatanSeeder");
        $this->call("UnitkerjaSeeder");
    }
}
