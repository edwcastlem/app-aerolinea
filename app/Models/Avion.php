<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Avion extends Model
{
	protected $table = 'aviones';
	protected $primaryKey = 'idAvion';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'capacidad' => 'int'
	];

	protected $fillable = [
		'modelo',
		'nroRegistro',
		'capacidad'
	];

	public function asientos()
	{
		return $this->hasMany(Asiento::class, 'idAvion');
	}

	public function vuelos()
	{
		return $this->hasMany(Vuelo::class, 'idAvion');
	}
}
