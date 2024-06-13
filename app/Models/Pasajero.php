<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Pasajero extends Model
{
	protected $table = 'pasajeros';
	protected $primaryKey = 'idPasajero';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'fechaNac' => 'datetime'
	];

	protected $fillable = [
		'nombres',
		'apellidos',
		'fechaNac',
		'dni',
		'pasaporte'
	];

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'idPasajero');
	}
}
