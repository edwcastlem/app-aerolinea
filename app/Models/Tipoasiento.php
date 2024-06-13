<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Tipoasiento extends Model
{
	protected $table = 'tipoasientos';
	protected $primaryKey = 'idTipoAsiento';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'precio' => 'float'
	];

	protected $fillable = [
		'descripcion',
		'precio'
	];

	public function asientos()
	{
		return $this->hasMany(Asiento::class, 'idTipoAsiento');
	}
}
