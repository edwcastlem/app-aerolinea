<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Asiento extends Model
{
	protected $table = 'asientos';
	protected $primaryKey = 'idAsiento';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'idTipoAsiento' => 'int',
		'idAvion' => 'int'
	];

	protected $fillable = [
		'codAsiento',
		'idTipoAsiento',
		'idAvion'
	];

	public function tipoasiento()
	{
		return $this->belongsTo(Tipoasiento::class, 'idTipoAsiento');
	}

	public function avione()
	{
		return $this->belongsTo(Avion::class, 'idAvion');
	}

	public function detallereservas()
	{
		return $this->hasMany(Detallereserva::class, 'idAsiento');
	}
}
