<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property int $user_id
 * @property int $assigned_to
 * @property string $subject
 * @property string $description
 * @property int $status_id
 * @property int $priority_id
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $closed_at
 * 
 * @property User $user
 * @property Category $category
 * @property Priority $priority
 * @property Status $status
 * @property Collection|TicketAttachment[] $ticket_attachments
 * @property Collection|TicketLog[] $ticket_logs
 * @property Collection|TicketMessage[] $ticket_messages
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';

	protected $casts = [
		'user_id' => 'int',
		'assigned_to' => 'int',
		'status_id' => 'int',
		'priority_id' => 'int',
		'category_id' => 'int',
		'closed_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'assigned_to',
		'subject',
		'description',
		'status_id',
		'priority_id',
		'category_id',
		'closed_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function priority()
	{
		return $this->belongsTo(Priority::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function ticket_attachments()
	{
		return $this->hasMany(TicketAttachment::class);
	}

	public function ticket_logs()
	{
		return $this->hasMany(TicketLog::class);
	}

	public function ticket_messages()
	{
		return $this->hasMany(TicketMessage::class);
	}
}
