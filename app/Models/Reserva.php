<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
	protected $table = 'reservas';
	protected $primaryKey = 'idReserva';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'fecha' => 'datetime',
		'total' => 'float',
		'idPasajero' => 'int',
		'idVuelo' => 'int',
		'idUsuario' => 'int'
	];

	protected $fillable = [
		'fecha',
		'ticket',
		'total',
		'idPasajero',
		'idVuelo',
		'idUsuario'
	];

	public function pasajero()
	{
		return $this->belongsTo(Pasajero::class, 'idPasajero');
	}

	public function vuelo()
	{
		return $this->belongsTo(Vuelo::class, 'idVuelo');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'idUsuario');
	}

	public function detallereservas()
	{
		return $this->hasMany(Detallereserva::class, 'idReserva');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'idReserva');
	}
}
