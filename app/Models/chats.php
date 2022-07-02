<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class chats
 * @package App\Models
 * @version July 1, 2022, 2:43 pm UTC
 *
 * @property string $sender_id
 * @property string $sender_message
 * @property string $receiver_id
 * @property string $receiver_message
 * @property string $referral_code
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class chats extends Model
{
    use HasFactory;

    public $table = 'chats';

    public $fillable = [
        'sender_id',
        'sender_message',
        'receiver_id',
        'receiver_message',
        'referral_code',
        'status',
        'created_by',
        'updated_by',
        'disable_by',
        'disable_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sender_id' => 'string',
        'sender_message' => 'string',
        'receiver_id' => 'string',
        'receiver_message' => 'string',
        'referral_code' => 'string',
        'status' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'disable_by' => 'string',
        'disable_at' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sender_id' => 'nullable|string',
        'sender_message' => 'nullable|string',
        'receiver_id' => 'nullable|string',
        'receiver_message' => 'nullable|string',
        'referral_code' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
