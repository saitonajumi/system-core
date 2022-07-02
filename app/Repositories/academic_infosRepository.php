<?php

namespace App\Repositories;

use App\Models\academic_infos;
use App\Repositories\BaseRepository;

/**
 * Class academic_infosRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:30 pm UTC
*/

class academic_infosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'college',
        'academic_year_level',
        'section',
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
        return academic_infos::class;
    }
}
