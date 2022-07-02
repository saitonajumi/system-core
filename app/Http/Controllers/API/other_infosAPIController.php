<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createother_infosAPIRequest;
use App\Http\Requests\API\Updateother_infosAPIRequest;
use App\Models\other_infos;
use App\Repositories\other_infosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class other_infosController
 * @package App\Http\Controllers\API
 */

class other_infosAPIController extends AppBaseController
{
    /** @var  other_infosRepository */
    private $otherInfosRepository;

    public function __construct(other_infosRepository $otherInfosRepo)
    {
        $this->otherInfosRepository = $otherInfosRepo;
    }

    /**
     * Display a listing of the other_infos.
     * GET|HEAD /otherInfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $otherInfos = $this->otherInfosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($otherInfos->toArray(), 'Other Infos retrieved successfully');
    }

    /**
     * Store a newly created other_infos in storage.
     * POST /otherInfos
     *
     * @param Createother_infosAPIRequest $request
     *
     * @return Response
     */
    public function store(Createother_infosAPIRequest $request)
    {
        $input = $request->all();

        $otherInfos = $this->otherInfosRepository->create($input);

        return $this->sendResponse($otherInfos->toArray(), 'Other Infos saved successfully');
    }

    /**
     * Display the specified other_infos.
     * GET|HEAD /otherInfos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var other_infos $otherInfos */
        $otherInfos = $this->otherInfosRepository->find($id);

        if (empty($otherInfos)) {
            return $this->sendError('Other Infos not found');
        }

        return $this->sendResponse($otherInfos->toArray(), 'Other Infos retrieved successfully');
    }

    /**
     * Update the specified other_infos in storage.
     * PUT/PATCH /otherInfos/{id}
     *
     * @param int $id
     * @param Updateother_infosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateother_infosAPIRequest $request)
    {
        $input = $request->all();

        /** @var other_infos $otherInfos */
        $otherInfos = $this->otherInfosRepository->find($id);

        if (empty($otherInfos)) {
            return $this->sendError('Other Infos not found');
        }

        $otherInfos = $this->otherInfosRepository->update($input, $id);

        return $this->sendResponse($otherInfos->toArray(), 'other_infos updated successfully');
    }

    /**
     * Remove the specified other_infos from storage.
     * DELETE /otherInfos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var other_infos $otherInfos */
        $otherInfos = $this->otherInfosRepository->find($id);

        if (empty($otherInfos)) {
            return $this->sendError('Other Infos not found');
        }

        $otherInfos->delete();

        return $this->sendSuccess('Other Infos deleted successfully');
    }
}
