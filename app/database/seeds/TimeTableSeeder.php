<?php

use Carbon\Carbon;

class TimeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('times')->delete();
        $dt = new Carbon;

        Time::create([ 'start_time'  =>  $dt->setTime(10, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(10, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(11, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(11, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(12, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(12, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(13, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(13, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(14, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(14, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(15, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(15, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(16, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(16, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(17, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(17, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(18, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(18, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(19, 0, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(19, 30, 0) ]);
        Time::create([ 'start_time'  =>  $dt->setTime(20, 0, 0) ]);
    }
}