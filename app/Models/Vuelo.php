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
		'precio' => 'float',
		'idEstadoVuelo' => 'int',
		'idAvion' => 'int'
	];

	protected $fillable = [
		'nroVuelo',
		'origen',
		'destino',
		'fechaSalida',
		'fechaLlegada',
		'precio',
		'terminal',
		'puerta',
		'idEstadoVuelo',
		'idAvion'
	];

	public function estadoVuelo()
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

	// // Mutators y Accesors para el manejo de fechas al recibir del front
	// public function setFechaSalidaAttribute($value)
    // {
    //     $this->attributes['fechaSalida'] = Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i');
    // }

    // public function getFechaSalidaAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i', $value)->format('d/m/Y H:i');
    // }

	// public function setFechaLlegadaAttribute($value)
    // {
    //     $this->attributes['fechaLlegada'] = Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i');
    // }

    // public function getFechaLlegadaAttribute($value)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i', $value)->format('d/m/Y H:i');
    // }
}
