<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Astitwa Kc',
            'email' => 'astitwakc@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
