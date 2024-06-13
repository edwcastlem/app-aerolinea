<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Tripulacion extends Model
{
	protected $table = 'tripulacion';
	protected $primaryKey = 'idTripulacion';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $fillable = [
		'nombres',
		'apellidos',
		'dni',
		'cargo'
	];

	public function vuelos()
	{
		return $this->belongsToMany(Vuelo::class, 'tripulacionvuelo', 'idTripulacion', 'idVuelo')
					->withPivot('idTripulacionVuelo');
	}
}
