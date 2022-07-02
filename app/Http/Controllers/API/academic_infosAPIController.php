<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createacademic_infosAPIRequest;
use App\Http\Requests\API\Updateacademic_infosAPIRequest;
use App\Models\academic_infos;
use App\Repositories\academic_infosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class academic_infosController
 * @package App\Http\Controllers\API
 */

class academic_infosAPIController extends AppBaseController
{
    /** @var  academic_infosRepository */
    private $academicInfosRepository;

    public function __construct(academic_infosRepository $academicInfosRepo)
    {
        $this->academicInfosRepository = $academicInfosRepo;
    }

    /**
     * Display a listing of the academic_infos.
     * GET|HEAD /academicInfos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $academicInfos = $this->academicInfosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($academicInfos->toArray(), 'Academic Infos retrieved successfully');
    }

    /**
     * Store a newly created academic_infos in storage.
     * POST /academicInfos
     *
     * @param Createacademic_infosAPIRequest $request
     *
     * @return Response
     */
    public function store(Createacademic_infosAPIRequest $request)
    {
        $input = $request->all();

        $academicInfos = $this->academicInfosRepository->create($input);

        return $this->sendResponse($academicInfos->toArray(), 'Academic Infos saved successfully');
    }

    /**
     * Display the specified academic_infos.
     * GET|HEAD /academicInfos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var academic_infos $academicInfos */
        $academicInfos = $this->academicInfosRepository->find($id);

        if (empty($academicInfos)) {
            return $this->sendError('Academic Infos not found');
        }

        return $this->sendResponse($academicInfos->toArray(), 'Academic Infos retrieved successfully');
    }

    /**
     * Update the specified academic_infos in storage.
     * PUT/PATCH /academicInfos/{id}
     *
     * @param int $id
     * @param Updateacademic_infosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateacademic_infosAPIRequest $request)
    {
        $input = $request->all();

        /** @var academic_infos $academicInfos */
        $academicInfos = $this->academicInfosRepository->find($id);

        if (empty($academicInfos)) {
            return $this->sendError('Academic Infos not found');
        }

        $academicInfos = $this->academicInfosRepository->update($input, $id);

        return $this->sendResponse($academicInfos->toArray(), 'academic_infos updated successfully');
    }

    /**
     * Remove the specified academic_infos from storage.
     * DELETE /academicInfos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var academic_infos $academicInfos */
        $academicInfos = $this->academicInfosRepository->find($id);

        if (empty($academicInfos)) {
            return $this->sendError('Academic Infos not found');
        }

        $academicInfos->delete();

        return $this->sendSuccess('Academic Infos deleted successfully');
    }
}
