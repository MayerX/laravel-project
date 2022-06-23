<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientDoctor
 * 
 * @property int $id
 * @property int $patientid
 * @property int $doctorid
 *
 * @package App\Models
 */
class PatientDoctor extends Model
{
	protected $table = 'patient_doctor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'patientid' => 'int',
		'doctorid' => 'int'
	];

	protected $fillable = [
		'id',
		'patientid',
		'doctorid'
	];
}
