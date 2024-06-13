<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tripulacionvuelo extends Model
{
	protected $table = 'tripulacionvuelo';
	protected $primaryKey = 'idTripulacionVuelo';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'idVuelo' => 'int',
		'idTripulacion' => 'int'
	];

	protected $fillable = [
		'idVuelo',
		'idTripulacion'
	];

	public function vuelo()
	{
		return $this->belongsTo(Vuelo::class, 'idVuelo');
	}

	public function tripulacion()
	{
		return $this->belongsTo(Tripulacion::class, 'idTripulacion');
	}
}
