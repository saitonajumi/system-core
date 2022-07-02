<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class applications
 * @package App\Models
 * @version July 1, 2022, 2:49 pm UTC
 *
 * @property string $personal_information
 * @property string $livelihood
 * @property string $certificate
 * @property string $boat_registration
 * @property string $status
 * @property string $created_by
 * @property string $updated_by
 * @property string $disable_by
 * @property string $disable_at
 */
class applications extends Model
{
    use HasFactory;

    public $table = 'applications';

    public $fillable = [
        'personal_information',
        'livelihood',
        'certificate',
        'boat_registration',
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
        'personal_information' => 'string',
        'livelihood' => 'string',
        'certificate' => 'string',
        'boat_registration' => 'string',
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
        'personal_information' => 'nullable|string',
        'livelihood' => 'nullable|string',
        'certificate' => 'nullable|string',
        'boat_registration' => 'nullable|string',
        'status' => 'nullable|string',
        'created_by' => 'nullable|string',
        'updated_by' => 'nullable|string',
        'disable_by' => 'nullable|string',
        'disable_at' => 'nullable|string'
    ];


}
