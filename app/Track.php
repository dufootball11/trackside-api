<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'track';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'state'];

	public function configs()
	{
		return $this->belongsToMany('App\TrackConfig')->withTimestamps();
	}

	public function trackSessions()
	{
		return $this->belongsToMany('App\TrackSession')->withTimestamps();
	}

}
