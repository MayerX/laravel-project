<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostCategory
 * 
 * @property int $ID
 * @property string $name
 * @property string $note
 *
 * @package App\Models
 */
class PostCategory extends Model
{
	protected $table = 'post_category';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int'
	];

	protected $fillable = [
		'name',
		'note'
	];
}
