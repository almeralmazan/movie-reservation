<?php

class CinemaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cinemas')->delete();

        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
        Cinema::create(
            ['occupied' => 1]
        );
    }
}