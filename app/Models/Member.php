<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * 
 * @property int $userId
 * @property int $memberId
 * @property int $memberType
 * @property string $limited
 * @property string $xianbingshi
 * @property string $jiwangshi
 * @property string $gerenshi
 * @property string $hunyushi
 * @property Carbon $diagnosisYear
 * @property string $guomingshi
 * @property string $jiazushi
 * @property string $doctors
 * @property string $kangfupingding
 * @property string $fuzhuzhenduan
 * @property string $linchuangzhenduan
 * @property string $kangfuzhenduan
 * @property string $kangfumubiao
 * @property string $kangfujihua
 * @property string $yundongchufang
 * @property string $VideoGuideIP
 *
 * @package App\Models
 */
class Member extends Model
{
	protected $table = 'members';
	protected $primaryKey = 'userId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'userId' => 'int',
		'memberId' => 'int',
		'memberType' => 'int'
	];

	protected $dates = [
		'diagnosisYear'
	];

	protected $fillable = [
		'memberId',
		'memberType',
		'limited',
		'xianbingshi',
		'jiwangshi',
		'gerenshi',
		'hunyushi',
		'diagnosisYear',
		'guomingshi',
		'jiazushi',
		'doctors',
		'kangfupingding',
		'fuzhuzhenduan',
		'linchuangzhenduan',
		'kangfuzhenduan',
		'kangfumubiao',
		'kangfujihua',
		'yundongchufang',
		'VideoGuideIP'
	];
}
