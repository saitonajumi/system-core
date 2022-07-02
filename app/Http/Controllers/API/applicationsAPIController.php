<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateapplicationsAPIRequest;
use App\Http\Requests\API\UpdateapplicationsAPIRequest;
use App\Models\applications;
use App\Repositories\applicationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class applicationsController
 * @package App\Http\Controllers\API
 */

class applicationsAPIController extends AppBaseController
{
    /** @var  applicationsRepository */
    private $applicationsRepository;

    public function __construct(applicationsRepository $applicationsRepo)
    {
        $this->applicationsRepository = $applicationsRepo;
    }

    /**
     * Display a listing of the applications.
     * GET|HEAD /applications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $applications = $this->applicationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($applications->toArray(), 'Applications retrieved successfully');
    }

    /**
     * Store a newly created applications in storage.
     * POST /applications
     *
     * @param CreateapplicationsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateapplicationsAPIRequest $request)
    {
        $input = $request->all();

        $applications = $this->applicationsRepository->create($input);

        return $this->sendResponse($applications->toArray(), 'Applications saved successfully');
    }

    /**
     * Display the specified applications.
     * GET|HEAD /applications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var applications $applications */
        $applications = $this->applicationsRepository->find($id);

        if (empty($applications)) {
            return $this->sendError('Applications not found');
        }

        return $this->sendResponse($applications->toArray(), 'Applications retrieved successfully');
    }

    /**
     * Update the specified applications in storage.
     * PUT/PATCH /applications/{id}
     *
     * @param int $id
     * @param UpdateapplicationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateapplicationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var applications $applications */
        $applications = $this->applicationsRepository->find($id);

        if (empty($applications)) {
            return $this->sendError('Applications not found');
        }

        $applications = $this->applicationsRepository->update($input, $id);

        return $this->sendResponse($applications->toArray(), 'applications updated successfully');
    }

    /**
     * Remove the specified applications from storage.
     * DELETE /applications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var applications $applications */
        $applications = $this->applicationsRepository->find($id);

        if (empty($applications)) {
            return $this->sendError('Applications not found');
        }

        $applications->delete();

        return $this->sendSuccess('Applications deleted successfully');
    }
}
