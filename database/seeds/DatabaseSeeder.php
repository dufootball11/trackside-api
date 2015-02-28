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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('CarTableSeeder');
        $this->call('CarUserTableSeeder');
        $this->call('PressureSeeder');
        $this->call('TrackSeeder');
        $this->call('ConfigSeeder');
        $this->call('TrackConfigSeeder');
        $this->call('SessionSeeder');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

	}

}


class UserTableSeeder extends Seeder {
 
    public function run() {
        DB::table('users')->truncate();
 
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

class RoleTableSeeder extends Seeder {
 
    public function run() {
        DB::table('roles')->truncate();
 
        App\Role::create(['name' => 'Admin']);
        App\Role::create(['name' => 'User']);
        App\Role::create(['name' => 'Vendor']);
    }
}

class RoleUserTableSeeder extends Seeder {
 
    public function run() {
        User::first()->roles()->attach(1);
    }
}

class CarTableSeeder extends Seeder {
 
    public function run() {
        DB::table('cars')->truncate();
 
        App\Car::create( [
            'make'  => 'BMW',
            'model' => 'M3',
            'year'  => '2002',
        ] );
    }
}

class CarUserTableSeeder extends Seeder {
 
    public function run() {
        User::first()->cars()->attach(1);
    }
}

class PressureSeeder extends Seeder {
 
    public function run() {
        DB::table('tire_pressures')->truncate();
 
        App\TirePressure::create( [
            'tire_1' => 32.0,
            'tire_2' => 32.0,
            'tire_3' => 32.0,
            'tire_4' => 32.0,
            'hot'    => 0,
        ] );

        App\TirePressure::create( [
            'tire_1' => 35.0,
            'tire_2' => 35.0,
            'tire_3' => 35.0,
            'tire_4' => 35.0,
            'hot'    => 1,
        ] );
    }
}

class TrackSeeder extends Seeder {
 
    public function run() {
        DB::table('track')->truncate();
 
        App\Track::create( [
            'name'  => 'WHP East',
            'state' => 'AZ',
        ] );
    }
}

class ConfigSeeder extends Seeder {
 
    public function run() {
        DB::table('track_config')->truncate();
 
        App\TrackConfig::create(['config' => 'Normal']);
    }
}

class TrackConfigSeeder extends Seeder {
 
    public function run() {
        App\Track::first()->configs()->attach(1);
    }
}

class SessionSeeder extends Seeder {
 
    public function run() {
        DB::table('track_session')->truncate();

        App\TrackSession::create( [
            'heat_cycles'   => 10,
            'tire'          => 'Michelin PSS',
            'tire_size'     => '255/40/18',
            'ambient_temp'  => 95.0,
            'best_lap_time' => 70.1,
        ] );

        User::first()->trackSessions()->attach(1);
        App\Track::first()->trackSessions()->attach(1);
        App\Car::first()->trackSessions()->attach(1);
        App\TirePressure::find(1)->trackSessions()->attach(1);
        App\TirePressure::find(2)->trackSessions()->attach(1);
    }
}