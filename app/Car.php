<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cars';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['make', 'model', 'year'];

	public function trackSessions()
	{
		return $this->belongsToMany('App\TrackSession')->withTimestamps();
	}

}
