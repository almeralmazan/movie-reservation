<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        User::create([
            'first_name'    =>  'admin',
            'last_name'     =>  'admin',
            'email'         =>  'admin@movie-reservation.com',
            'password'      =>  Hash::make('admin'),
            'admin'         =>  1
        ]);
    }
}