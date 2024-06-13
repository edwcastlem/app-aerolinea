<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Detallereserva extends Model
{
	protected $table = 'detallereserva';
	protected $primaryKey = 'idDetalleReserva';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'idReserva' => 'int',
		'idAsiento' => 'int'
	];

	protected $fillable = [
		'idReserva',
		'idAsiento'
	];

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'idReserva');
	}

	public function asiento()
	{
		return $this->belongsTo(Asiento::class, 'idAsiento');
	}
}
