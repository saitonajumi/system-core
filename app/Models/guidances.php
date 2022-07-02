<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class guidances
 * @package App\Models
 * @version July 1, 2022, 2:39 pm UTC
 *
 * @property string $users_id
 * @property string $referral_code
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class guidances extends Model
{
    use HasFactory;

    public $table = 'guidances';

    public $fillable = [
        'users_id',
        'referral_code',
        'status',
        'created_by',
        'updated_by',
        'disable_by',
        'disable_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'users_id' => 'integer',
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
        'users_id' => 'nullable|integer',
        'referral_code' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
