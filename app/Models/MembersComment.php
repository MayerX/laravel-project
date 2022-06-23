<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MembersComment
 * 
 * @property int $userId
 * @property int $memberId
 * @property int $doctorId
 * @property Carbon $time
 * @property string $comment
 *
 * @package App\Models
 */
class MembersComment extends Model
{
	protected $table = 'members_comments';
	protected $primaryKey = 'time';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'userId' => 'int',
		'memberId' => 'int',
		'doctorId' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'userId',
		'memberId',
		'doctorId',
		'comment'
	];
}
