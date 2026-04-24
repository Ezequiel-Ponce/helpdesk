<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * * @property int $id
 * @property int $department_id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property bool|null $is_active
 * @property string|null $remember_token
 * @property string $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * * @property Department $department
 * @property Collection|SystemLog[] $system_logs
 * @property Collection|TicketLog[] $ticket_logs
 * @property Collection|TicketMessage[] $ticket_messages
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $casts = [
        'department_id' => 'int',
        'email_verified_at' => 'datetime',
        'is_active' => 'bool',
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'department_id',
        'name',
        'password',
        'email',
        'is_active',
        'role'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function system_logs()
    {
        return $this->hasMany(SystemLog::class);
    }

    public function ticket_logs()
    {
        return $this->hasMany(TicketLog::class);
    }

    public function ticket_messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}