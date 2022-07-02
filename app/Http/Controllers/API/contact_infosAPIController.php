<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcontact_infosAPIRequest;
use App\Http\Requests\API\Updatecontact_infosAPIRequest;
use App\Models\contact_infos;
use App\Repositories\contact_infosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class contact_infosController
 * @package App\Http\Controllers\API
 */

class contact_infosAPIController extends AppBaseController
{
    /** @var  contact_infosRepository */
    private $contactInfosRepository;

    public function __construct(contact_infosRepository $contactInfosRepo)
    {
        $this->contactInfosRepository = $contactInfosRepo;
    }

    /**
     * Display a listing of the contact_infos.
     * GET|HEAD /contactInfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contactInfos = $this->contactInfosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contactInfos->toArray(), 'Contact Infos retrieved successfully');
    }

    /**
     * Store a newly created contact_infos in storage.
     * POST /contactInfos
     *
     * @param Createcontact_infosAPIRequest $request
     *
     * @return Response
     */
    public function store(Createcontact_infosAPIRequest $request)
    {
        $input = $request->all();

        $contactInfos = $this->contactInfosRepository->create($input);

        return $this->sendResponse($contactInfos->toArray(), 'Contact Infos saved successfully');
    }

    /**
     * Display the specified contact_infos.
     * GET|HEAD /contactInfos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var contact_infos $contactInfos */
        $contactInfos = $this->contactInfosRepository->find($id);

        if (empty($contactInfos)) {
            return $this->sendError('Contact Infos not found');
        }

        return $this->sendResponse($contactInfos->toArray(), 'Contact Infos retrieved successfully');
    }

    /**
     * Update the specified contact_infos in storage.
     * PUT/PATCH /contactInfos/{id}
     *
     * @param int $id
     * @param Updatecontact_infosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecontact_infosAPIRequest $request)
    {
        $input = $request->all();

        /** @var contact_infos $contactInfos */
        $contactInfos = $this->contactInfosRepository->find($id);

        if (empty($contactInfos)) {
            return $this->sendError('Contact Infos not found');
        }

        $contactInfos = $this->contactInfosRepository->update($input, $id);

        return $this->sendResponse($contactInfos->toArray(), 'contact_infos updated successfully');
    }

    /**
     * Remove the specified contact_infos from storage.
     * DELETE /contactInfos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var contact_infos $contactInfos */
        $contactInfos = $this->contactInfosRepository->find($id);

        if (empty($contactInfos)) {
            return $this->sendError('Contact Infos not found');
        }

        $contactInfos->delete();

        return $this->sendSuccess('Contact Infos deleted successfully');
    }
}
