<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TirePressure extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tire_pressures';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tire_1', 'tire_2', 'tire_3', 'tire_4', 'hot'];

	public function trackSessions()
	{
		return $this->belongsToMany('App\TrackSession');
	}

}
