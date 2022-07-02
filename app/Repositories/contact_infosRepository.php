<?php

namespace App\Repositories;

use App\Models\contact_infos;
use App\Repositories\BaseRepository;

/**
 * Class contact_infosRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:33 pm UTC
*/

class contact_infosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'contact_number',
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
        return contact_infos::class;
    }
}
