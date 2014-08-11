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
            'admin'         =>  1,
            'code'          =>  '',
            'active'        =>  1
        ]);

        User::create([
            'first_name'    =>  'ayi',
            'last_name'     =>  'madia',
            'email'         =>  'ayi@gmail.com',
            'password'      =>  Hash::make('ayi'),
            'mobile_number' =>  '+639353626640',
            'admin'         =>  2,   // member
            'code'          =>  '',
            'active'        =>  1
        ]);

        User::create([
            'first_name'    =>  'xian',
            'last_name'     =>  'yancy',
            'email'         =>  'xian@gmail.com',
            'password'      =>  Hash::make('xian'),
            'mobile_number' =>  '+639336013797',
            'admin'         =>  2,   // member
            'code'          =>  '',
            'active'        =>  1
        ]);

        User::create([
            'first_name'    =>  'arnold',
            'last_name'     =>  'piala',
            'email'         =>  'arnold@gmail.com',
            'password'      =>  Hash::make('arnold'),
            'mobile_number' =>  '+639494149766',
            'admin'         =>  2,   // member
            'code'          =>  '',
            'active'        =>  1
        ]);

        User::create([
            'first_name'    =>  'juan',
            'last_name'     =>  'dela cruz',
            'email'         =>  'juandelacruz@gmail.com',
            'password'      =>  Hash::make('juan'),
            'mobile_number' =>  '+639159115122',
            'admin'         =>  0,   // walkin
            'code'          =>  '',
            'active'        =>  0
        ]);

        User::create([
            'first_name'    =>  'mari',
            'last_name'     =>  'mar',
            'email'         =>  'marimar@gmail.com',
            'password'      =>  Hash::make('marimar'),
            'mobile_number' =>  '+639159222345',
            'admin'         =>  0,   // walkin
            'code'          =>  '',
            'active'        =>  0
        ]);
    }
}