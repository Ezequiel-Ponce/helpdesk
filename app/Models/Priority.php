<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Priority
 * 
 * @property int $id
 * @property string $name
 * @property int $response_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Priority extends Model
{
	protected $table = 'priorities';

	protected $casts = [
		'response_time' => 'int'
	];

	protected $fillable = [
		'name',
		'response_time'
	];

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
