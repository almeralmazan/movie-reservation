<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->command->info('User table seeded');

        $this->call('MovieTableSeeder');
        $this->command->info('Movie table seeded');

        $this->call('CinemaTableSeeder');
        $this->command->info('Cinema table seeded');

        $this->call('CinemaTimeTableSeeder');
        $this->command->info('CinemaTime table seeded');
	}

}
