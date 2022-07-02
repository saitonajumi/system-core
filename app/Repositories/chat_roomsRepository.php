<?php

namespace App\Repositories;

use App\Models\chat_rooms;
use App\Repositories\BaseRepository;

/**
 * Class chat_roomsRepository
 * @package App\Repositories
 * @version July 1, 2022, 2:45 pm UTC
*/

class chat_roomsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'chat_id',
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
        return chat_rooms::class;
    }
}
