<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackSession extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'track_session';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['heat_cycles', 'tire', 'tire_size', 'ambient_temp', 'best_lap_time'];

	public function tirePressures()
	{
		return $this->belongsToMany('App\TirePressure')->withTimestamps();
	}

	public function scopeHotPressure($query)
	{
		return $query->where('hot', '=', 1);
	}

}
