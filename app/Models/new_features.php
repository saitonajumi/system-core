<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class new_features
 * @package App\Models
 * @version July 1, 2022, 2:46 pm UTC
 *
 * @property string $users_id
 * @property string $title
 * @property string $feature_description
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class new_features extends Model
{
    use HasFactory;

    public $table = 'new_features';

    public $fillable = [
        'users_id',
        'title',
        'feature_description',
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
        'title' => 'string',
        'feature_description' => 'string',
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
        'title' => 'nullable|string',
        'feature_description' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
