<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User as User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}


class UserTableSeeder extends Seeder {
 
    public function run() {
        User::truncate();
 
        User::create( [
            'email' 	=> 'dufootball11@gmail.com' ,
            'password' 	=> Hash::make( 'tracksideAppAdmin' ) ,
            'name' 		=> 'Billy Janssen' ,
        ] );

        User::create( [
            'email' 	=> 'vivanitski@gmail.com' ,
            'password' 	=> Hash::make( 'tracksideAppAdmin' ) ,
            'name' 		=> 'Val Ivanitski' ,
        ] );
    }
}