<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HospitalName
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class HospitalName extends Model
{
	protected $table = 'hospital_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'name'
	];
}
