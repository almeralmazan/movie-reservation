<?php

class CinemaTimeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cinema_time')->delete();

        CinemaTime::create([
            'cinema_id' =>  1,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  1,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  1,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  1,
            'time_id'   =>  4
        ]);

        CinemaTime::create([
            'cinema_id' =>  2,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  3,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  3,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  3,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  4
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  5
        ]);

        CinemaTime::create([
            'cinema_id' =>  4,
            'time_id'   =>  6
        ]);

        CinemaTime::create([
            'cinema_id' =>  5,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  5,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  6,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  6,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  6,
            'time_id'   =>  4
        ]);

        CinemaTime::create([
            'cinema_id' =>  7,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  7,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  8,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  8,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  8,
            'time_id'   =>  5
        ]);

        CinemaTime::create([
            'cinema_id' =>  9,
            'time_id'   =>  1
        ]);

        CinemaTime::create([
            'cinema_id' =>  9,
            'time_id'   =>  2
        ]);

        CinemaTime::create([
            'cinema_id' =>  10,
            'time_id'   =>  3
        ]);

        CinemaTime::create([
            'cinema_id' =>  10,
            'time_id'   =>  4
        ]);

        CinemaTime::create([
            'cinema_id' =>  10,
            'time_id'   =>  5
        ]);

        CinemaTime::create([
            'cinema_id' =>  10,
            'time_id'   =>  6
        ]);
    }
}