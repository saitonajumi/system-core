<?php

namespace App\Repositories;

use App\Models\announcements;
use App\Repositories\BaseRepository;

/**
 * Class announcementsRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:47 pm UTC
*/

class announcementsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'title',
        'feature_description',
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
        return announcements::class;
    }
}
