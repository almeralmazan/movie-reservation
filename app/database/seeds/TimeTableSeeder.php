<?php

class TimeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('times')->delete();

        Time::create([

        ]);

        Time::create([

        ]);

    }
}