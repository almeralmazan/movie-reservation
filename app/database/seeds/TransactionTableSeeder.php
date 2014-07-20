<?php

class TransactionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('transactions')->delete();

        Transaction::create([
            'receipt_number'    =>  1,
            'tickets_bought'    =>  3,
            'burger_bought'     =>  1,
            'fries_bought'      =>  1,
            'soda_bought'       =>  1,
            'total'             =>  295,
            'paid_status'       =>  1
        ]);

        Transaction::create([
            'receipt_number'    =>  2,
            'tickets_bought'    =>  3,
            'burger_bought'     =>  3,
            'fries_bought'      =>  3,
            'soda_bought'       =>  3,
            'total'             =>  435,
            'paid_status'       =>  1
        ]);

        Transaction::create([
            'receipt_number'    =>  3,
            'tickets_bought'    =>  3,
            'burger_bought'     =>  2,
            'fries_bought'      =>  2,
            'soda_bought'       =>  2,
            'total'             =>  365,
            'paid_status'       =>  1
        ]);

        Transaction::create([
            'receipt_number'    =>  4,
            'tickets_bought'    =>  1,
            'burger_bought'     =>  0,
            'fries_bought'      =>  0,
            'soda_bought'       =>  0,
            'total'             =>  75,
            'paid_status'       =>  0
        ]);

        Transaction::create([
            'receipt_number'    =>  5,
            'tickets_bought'    =>  2,
            'burger_bought'     =>  2,
            'fries_bought'      =>  2,
            'soda_bought'       =>  2,
            'total'             =>  290,
            'paid_status'       =>  1
        ]);
    }
}
