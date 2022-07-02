<?php

namespace App\Repositories;

use App\Models\applications;
use App\Repositories\BaseRepository;

/**
 * Class applicationsRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:49 pm UTC
*/

class applicationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personal_information',
        'livelihood',
        'certificate',
        'boat_registration',
        'status',
        'created_by',
        'updated_by',
        'disable_by',
        'disable_at'
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
        return applications::class;
    }
}
