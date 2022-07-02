<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class appointments
 * @package App\Models
 * @version July 1, 2022, 2:35 pm UTC
 *
 * @property string $users_id
 * @property string $category_id
 * @property string $guidance_id
 * @property string $reason
 * @property string $notes
 * @property string $status
 * @property string $approve_schedule
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 * @property string $decline_by
 */
class appointments extends Model
{
    use HasFactory;

    public $table = 'appointments';

    public $fillable = [
        'users_id',
        'category_id',
        'guidance_id',
        'reason',
        'notes',
        'status',
        'approve_schedule',
        'created_by',
        'updated_by',
        'disable_by',
        'disable_at',
        'decline_by',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'users_id' => 'integer',
        'category_id' => 'integer',
        'guidance_id' => 'integer',
        'reason' => 'string',
        'notes' => 'string',
        'status' => 'string',
        'approve_schedule' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'disable_by' => 'string',
        'disable_at' => 'string',
        'decline_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'nullable|integer',
        'category_id' => 'nullable|integer',
        'guidance_id' => 'nullable|integer',
        'reason' => 'nullable|string',
        'notes' => 'nullable|string',
        'status' => 'nullable|string',
        'approve_schedule' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string',
        'decline_by' => 'nullable|string'
    ];


}
