<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'first_name'    =>  'admin',
            'last_name'     =>  'admin',
            'email'         =>  'admin@movie-reservation.com',
            'password'      =>  Hash::make('admin'),
            'mobile_number' =>  '+639159115188',
            'admin'         =>  1
        ]);

        User::create([
            'first_name'    =>  'ayi',
            'last_name'     =>  'madia',
            'email'         =>  'ayi@gmail.com',
            'password'      =>  Hash::make('ayi'),
            'mobile_number' =>  '+639353626640',
            'admin'         =>  0
        ]);
    }
}