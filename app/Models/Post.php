<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property int $postid
 * @property int $parentid
 * @property int $poster
 * @property string $title
 * @property string $content
 * @property string $posted
 * @property int $category
 * @property int $timesofview
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';
	protected $primaryKey = 'postid';
	public $timestamps = false;

	protected $casts = [
		'parentid' => 'int',
		'poster' => 'int',
		'category' => 'int',
		'timesofview' => 'int'
	];

	protected $fillable = [
		'parentid',
		'poster',
		'title',
		'content',
		'posted',
		'category',
		'timesofview'
	];
}
