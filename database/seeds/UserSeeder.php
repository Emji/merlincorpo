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
            'name' => "Julian",
            'email' => 'ju.m.photography@gmail.com',
            'password' => bcrypt('admine1234'),
            'isAdmin' => true,
        ]);
    }
}
