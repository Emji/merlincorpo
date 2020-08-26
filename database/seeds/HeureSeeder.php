<?php

use Illuminate\Database\Seeder;

class HeureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('heures')->insert([
            'heure' => "9h00 - 9h30",

       ]);
        DB::table('heures')->insert([
            'heure' => "9h30 - 9h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "10h00 - 10h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "10h30 - 11h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "11h00 - 11h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "11h30 - 12h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "12h00 - 12h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "12h30 - 13h00",

        ]);
    }
}
