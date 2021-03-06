<?php

class ReservedSeatTableSeeder extends Seeder {

    public function run()
    {
        DB::table('reserved_seats')->delete();

        ReservedSeat::create([
            'customer_name'     =>  'ayi',
            'customer_status'   =>  'member',
            'transaction_id'    =>  1,
            'seat_number'       =>  1,
            'cinema_id'         =>  1,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'ayi',
            'customer_status'   =>  'member',
            'transaction_id'    =>  1,
            'seat_number'       =>  2,
            'cinema_id'         =>  1,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'ayi',
            'customer_status'   =>  'member',
            'transaction_id'    =>  1,
            'seat_number'       =>  3,
            'cinema_id'         =>  1,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'xian',
            'customer_status'   =>  'member',
            'transaction_id'    =>  2,
            'seat_number'       =>  1,
            'cinema_id'         =>  2,
            'time_id'           =>  1
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'xian',
            'customer_status'   =>  'member',
            'transaction_id'    =>  2,
            'seat_number'       =>  3,
            'cinema_id'         =>  2,
            'time_id'           =>  1
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'xian',
            'customer_status'   =>  'member',
            'transaction_id'    =>  2,
            'seat_number'       =>  4,
            'cinema_id'         =>  2,
            'time_id'           =>  1
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'arnold',
            'customer_status'   =>  'member',
            'transaction_id'    =>  3,
            'seat_number'       =>  6,
            'cinema_id'         =>  2,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'arnold',
            'customer_status'   =>  'member',
            'transaction_id'    =>  3,
            'seat_number'       =>  7,
            'cinema_id'         =>  2,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'arnold',
            'customer_status'   =>  'member',
            'transaction_id'    =>  3,
            'seat_number'       =>  9,
            'cinema_id'         =>  2,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'walkin',
            'customer_status'   =>  'walkin',
            'transaction_id'    =>  4,
            'seat_number'       =>  10,
            'cinema_id'         =>  2,
            'time_id'           =>  2
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'walkin',
            'customer_status'   =>  'walkin',
            'transaction_id'    =>  5,
            'seat_number'       =>  11,
            'cinema_id'         =>  3,
            'time_id'           =>  1
        ]);

        ReservedSeat::create([
            'customer_name'     =>  'walkin',
            'customer_status'   =>  'walkin',
            'transaction_id'    =>  5,
            'seat_number'       =>  12,
            'cinema_id'         =>  3,
            'time_id'           =>  1
        ]);
    }
}
