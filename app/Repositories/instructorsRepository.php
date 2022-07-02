<?php

namespace App\Repositories;

use App\Models\instructors;
use App\Repositories\BaseRepository;

/**
 * Class instructorsRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:40 pm UTC
*/

class instructorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
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
        return instructors::class;
    }
}
