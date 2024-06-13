<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Pago extends Model
{
	protected $table = 'pagos';
	protected $primaryKey = 'idPago';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'monto' => 'float',
		'fechaPago' => 'datetime',
		'idReserva' => 'int'
	];

	protected $fillable = [
		'monto',
		'fechaPago',
		'metodoPago',
		'idReserva'
	];

	public function reserva()
	{
		return $this->belongsTo(Reserva::class, 'idReserva');
	}
}
