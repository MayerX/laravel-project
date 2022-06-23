<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommunityName
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class CommunityName extends Model
{
	protected $table = 'community_name';
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
