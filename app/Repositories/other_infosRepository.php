<?php

namespace App\Repositories;

use App\Models\other_infos;
use App\Repositories\BaseRepository;

/**
 * Class other_infosRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:28 pm UTC
*/

class other_infosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'photo',
        'infos',
        'status',
        'created_by',
        'updated_by',
        'disable_by'
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
        return other_infos::class;
    }
}
