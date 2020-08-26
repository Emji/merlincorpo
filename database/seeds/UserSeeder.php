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
        DB::table('users')->insert([
            'name' => "Julien",
            'email' => 'ju.m.photography@gmail.com',
            'password' => 'admin1234',
            'isAdmin' => true,
        ]);
    }
}
