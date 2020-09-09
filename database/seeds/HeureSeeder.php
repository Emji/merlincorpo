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
            'heure' => "9h00 à 9h30",

       ]);
        DB::table('heures')->insert([
            'heure' => "9h30 à 10h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "10h00 à 10h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "10h30 à 11h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "11h00 à 11h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "11h30 à 12h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "12h00 à 12h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "12h30 à 13h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "13h00 à 13h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "13h30 à 14h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "14h00 à 14h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "14h30 à 15h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "15h00 à 15h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "15h30 à 16h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "16h00 à 16h30",

        ]);
        DB::table('heures')->insert([
            'heure' => "16h30 à 17h00",

        ]);
        DB::table('heures')->insert([
            'heure' => "17h00 à 17h30",

        ]);
    }
}
