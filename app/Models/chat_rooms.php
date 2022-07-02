<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class chat_rooms
 * @package App\Models
 * @version July 1, 2022, 2:45 pm UTC
 *
 * @property  $chat_id
 * @property  $status
 * @property  $created_by
 * @property  $updated_by
 * @property  $disable_by
 * @property  $disable_at
 */
class chat_rooms extends Model
{
    use HasFactory;

    public $table = 'chat_rooms';

    public $fillable = [
        'chat_id',
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
        'chat_id' => 'string',
        'status' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'disable_by' => 'string',
        'disable_at' => 'string',
        'created_at' => 'string',
        'updated_at' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'chat_id' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string',
        'created_at' => 'nullable|string',
        'updated_at' => 'nullable|string'
    ];


}
