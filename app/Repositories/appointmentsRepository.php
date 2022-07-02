<?php

namespace App\Repositories;

use App\Models\appointments;
use App\Repositories\BaseRepository;

/**
 * Class appointmentsRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:35 pm UTC
*/

class appointmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'decline_by'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return appointments::class;
    }
}
