<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Vuelo extends Model
{
	protected $table = 'vuelos';
	protected $primaryKey = 'idVuelo';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'fechaSalida' => 'datetime',
		'fechaLlegada' => 'datetime',
		'idEstadoVuelo' => 'int',
		'idAvion' => 'int'
	];

	protected $fillable = [
		'nroVuelo',
		'origen',
		'destino',
		'fechaSalida',
		'fechaLlegada',
		'terminal',
		'puerta',
		'idEstadoVuelo',
		'idAvion'
	];

	public function estadovuelo()
	{
		return $this->belongsTo(Estadovuelo::class, 'idEstadoVuelo');
	}

	public function avion()
	{
		return $this->belongsTo(Avion::class, 'idAvion');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'idVuelo');
	}

	public function tripulaciones()
	{
		return $this->belongsToMany(Tripulacion::class, 'tripulacionvuelo', 'idVuelo', 'idTripulacion')
					->withPivot('idTripulacionVuelo');
	}
}
