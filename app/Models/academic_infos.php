<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class academic_infos
 * @package App\Models
 * @version July 1, 2022, 2:30 pm UTC
 *
 * @property string $users_id
 * @property string $college
 * @property string $academic_year_level
 * @property string $section
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class academic_infos extends Model
{
    use HasFactory;

    public $table = 'academic_infos';

    public $fillable = [
        'users_id',
        'college',
        'academic_year_level',
        'section',
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
        'users_id' => 'string',
        'college' => 'string',
        'academic_year_level' => 'string',
        'section' => 'string',
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
        'users_id' => 'nullable|string',
        'college' => 'nullable|string',
        'academic_year_level' => 'nullable|string',
        'section' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];

}
