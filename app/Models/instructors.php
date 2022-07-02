<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class instructors
 * @package App\Models
 * @version July 1, 2022, 2:40 pm UTC
 *
 * @property string $users_id
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class instructors extends Model
{
    use HasFactory;

    public $table = 'instructors';

    public $fillable = [
        'users_id',
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
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
