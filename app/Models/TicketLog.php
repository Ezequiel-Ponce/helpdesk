<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketLog
 * 
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $action
 * @property string $description
 * @property Carbon|null $created_at
 * 
 * @property Ticket $ticket
 * @property User $user
 *
 * @package App\Models
 */
class TicketLog extends Model
{
	protected $table = 'ticket_logs';
	public $timestamps = false;

	protected $casts = [
		'ticket_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'ticket_id',
		'user_id',
		'action',
		'description'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
