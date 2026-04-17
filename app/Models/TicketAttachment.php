<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketAttachment
 * 
 * @property int $id
 * @property int $ticket_id
 * @property string $original_name
 * @property string $file_path
 * @property int $file_size
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ticket $ticket
 *
 * @package App\Models
 */
class TicketAttachment extends Model
{
	protected $table = 'ticket_attachments';

	protected $casts = [
		'ticket_id' => 'int',
		'file_size' => 'int'
	];

	protected $fillable = [
		'ticket_id',
		'original_name',
		'file_path',
		'file_size'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}
}
