<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Rol extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'idRol';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $fillable = [
		'descripcion'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'idRol');
	}
}
