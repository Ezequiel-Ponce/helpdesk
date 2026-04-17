<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageAttachment
 * 
 * @property int $id
 * @property int $ticket_message_id
 * @property string $original_name
 * @property string $file_path
 * @property int $file_size
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TicketMessage $ticket_message
 *
 * @package App\Models
 */
class MessageAttachment extends Model
{
	protected $table = 'message_attachments';

	protected $casts = [
		'ticket_message_id' => 'int',
		'file_size' => 'int'
	];

	protected $fillable = [
		'ticket_message_id',
		'original_name',
		'file_path',
		'file_size'
	];

	public function ticket_message()
	{
		return $this->belongsTo(TicketMessage::class);
	}
}
