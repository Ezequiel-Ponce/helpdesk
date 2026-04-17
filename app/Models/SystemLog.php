<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SystemLog
 * 
 * @property int $id
 * @property int $user_id
 * @property string $module
 * @property string $action
 * @property Carbon|null $created_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class SystemLog extends Model
{
	protected $table = 'system_logs';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'module',
		'action'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
