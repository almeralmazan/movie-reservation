<?php

class ReservedSeatTableSeeder extends Seeder {

    public function run()
    {
        DB::table('reserved_seat')->delete();

        ReservedSeat::create([
            'customer_name'     =>  'ayi',
            'customer_status'   =>  'member',
            'seat_id'           =>  1,
            'cinema_id'         =>  1,
            'time_id'           =>  1
        ]);
    }
}
