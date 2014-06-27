<?php

class CinemaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cinemas')->delete();

        for ($i = 0; $i < 10; $i++)
        {
            Cinema::create( ['occupied' => 1] );
        }
    }
}