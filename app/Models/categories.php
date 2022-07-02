<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class categories
 * @package App\Models
 * @version July 1, 2022, 2:37 pm UTC
 *
 * @property string $code
 * @property string $description
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class categories extends Model
{
    use HasFactory;

    public $table = 'categories';

    public $fillable = [
        'code',
        'description',
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
        'code' => 'string',
        'description' => 'string',
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
        'code' => 'nullable|string',
        'description' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
