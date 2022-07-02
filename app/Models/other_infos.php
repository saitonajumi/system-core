<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class other_infos
 * @package App\Models
 * @version July 1, 2022, 2:28 pm UTC
 *
 * @property string $users_id
 * @property string $photo
 * @property string $infos
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 */
class other_infos extends Model
{
    use HasFactory;

    public $table = 'other_infos';

    public $fillable = [
        'users_id',
        'photo',
        'infos',
        'status',
        'created_by',
        'updated_by',
        'disable_by',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'users_id' => 'integer',
        'photo' => 'string',
        'infos' => 'string',
        'status' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'disable_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'nullable|integer',
        'photo' => 'nullable|string',
        'infos' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string'
    ];
}
