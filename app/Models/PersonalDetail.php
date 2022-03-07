<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonalDetail
 * 
 * @property int $userId
 * @property string $name
 * @property string $sex
 * @property int $age
 * @property string $minzu
 * @property string $hunyin
 * @property string $jiguan
 * @property string $wenhuachengdu
 * @property string $zhiye
 * @property string $gongzuodanwei
 * @property Carbon $dateOfBirth
 * @property string $address
 * @property int $Hospital
 * @property string $Department
 * @property int $community
 * @property string $email
 * @property string $mobilephone
 * @property string $housephone
 * @property string $photo
 * @property string $expert
 * @property string $dateJoined
 *
 * @package App\Models
 */
class PersonalDetail extends Model
{
	protected $table = 'personal_details';
	protected $primaryKey = 'userId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'userId' => 'int',
		'age' => 'int',
		'Hospital' => 'int',
		'community' => 'int'
	];

	protected $dates = [
		'dateOfBirth'
	];

	protected $fillable = [
		'name',
		'sex',
		'age',
		'minzu',
		'hunyin',
		'jiguan',
		'wenhuachengdu',
		'zhiye',
		'gongzuodanwei',
		'dateOfBirth',
		'address',
		'Hospital',
		'Department',
		'community',
		'email',
		'mobilephone',
		'housephone',
		'photo',
		'expert',
		'dateJoined'
	];
}
