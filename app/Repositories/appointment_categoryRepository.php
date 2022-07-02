<?php

namespace App\Repositories;

use App\Models\appointment_category;
use App\Repositories\BaseRepository;

/**
 * Class appointment_categoryRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:36 pm UTC
*/

class appointment_categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'appointment_id',
        'category_id',
        'data',
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
        return appointment_category::class;
    }
}
