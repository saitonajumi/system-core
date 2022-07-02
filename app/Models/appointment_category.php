<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class appointment_category
 * @package App\Models
 * @version July 1, 2022, 2:36 pm UTC
 *
 * @property string $appointment_id
 * @property string $category_id
 * @property string $data
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class appointment_category extends Model
{
    use HasFactory;

    public $table = 'appointment_categories';

    public $fillable = [
        'appointment_id',
        'category_id',
        'data',
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
        'appointment_id' => 'string',
        'category_id' => 'string',
        'data' => 'string',
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
        'appointment_id' => 'nullable|string',
        'category_id' => 'nullable|string',
        'data' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
