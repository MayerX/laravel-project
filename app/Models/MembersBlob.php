<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MembersBlob
 * 
 * @property int $userId
 * @property int $size
 * @property string $file
 * @property Carbon $time
 * @property int $MovementType
 * @property Carbon $SamplingTime
 * @property int $score
 * @property int $EffectiveMotion
 * @property int|null $PredictType
 *
 * @package App\Models
 */
class MembersBlob extends Model
{
	protected $table = 'members_blob';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'userId' => 'int',
		'size' => 'int',
		'MovementType' => 'int',
		'score' => 'int',
		'EffectiveMotion' => 'int',
		'PredictType' => 'int'
	];

	protected $dates = [
		'time',
		'SamplingTime'
	];

	protected $fillable = [
		'userId',
		'size',
		'file',
		'time',
		'MovementType',
		'SamplingTime',
		'score',
		'EffectiveMotion',
		'PredictType'
	];
}
