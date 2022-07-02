<?php

namespace App\Repositories;

use App\Models\guidances;
use App\Repositories\BaseRepository;

/**
 * Class guidancesRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:39 pm UTC
*/

class guidancesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'referral_code',
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
        return guidances::class;
    }
}
