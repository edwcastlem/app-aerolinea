<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * 
 * @property string|null $email
 * @property string|null $password
 * @property string|null $nombres
 * @property string|null $apellidos
 * @property string|null $dni
 * @property string|null $telefono
 * @property Carbon|null $fechaNac
 * @property int|null $idRol
 * 
 * @property Role|null $role
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasFactory, Notifiable;
	
	//protected $table = 'usuarios';
	//protected $primaryKey = 'idUsuario';
	//public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'email_verified_at' => 'datetime',
		'fechaNac' => 'datetime',
		'idRol' => 'int',
		'password' => 'hashed',
	];

	protected $fillable = [
		'email',
		'password',
		'nombres',
		'apellidos',
		'dni',
		'telefono',
		'fechaNac',
		'idRol'
	];

	/**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'idRol');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'idUsuario');
	}
}
