<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $userId
 * @property int $type
 * @property string $username
 * @property string $password
 * @property string $lastAccessTime
 * @property int $status
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	protected $primaryKey = 'userId';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'type',
		'username',
		'password',
		'lastAccessTime',
		'status'
	];
}
