<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Estadovuelo extends Model
{
	protected $table = 'estadovuelo';
	protected $primaryKey = 'idEstadoVuelo';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $fillable = [
		'estado'
	];

	public function vuelos()
	{
		return $this->hasMany(Vuelo::class, 'idEstadoVuelo');
	}
}
