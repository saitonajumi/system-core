<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class contact_infos
 * @package App\Models
 * @version July 1, 2022, 2:33 pm UTC
 *
 * @property string $users_id
 * @property string $contact_number
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class contact_infos extends Model
{
    use HasFactory;

    public $table = 'contact_infos';

    public $fillable = [
        'users_id',
        'contact_number',
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
        'users_id' => 'integer',
        'contact_number' => 'string',
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
        'contact_number' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
