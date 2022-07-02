<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinstructorsAPIRequest;
use App\Http\Requests\API\UpdateinstructorsAPIRequest;
use App\Models\instructors;
use App\Repositories\instructorsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class instructorsController
 * @package App\Http\Controllers\API
 */

class instructorsAPIController extends AppBaseController
{
    /** @var  instructorsRepository */
    private $instructorsRepository;

    public function __construct(instructorsRepository $instructorsRepo)
    {
        $this->instructorsRepository = $instructorsRepo;
    }

    /**
     * Display a listing of the instructors.
     * GET|HEAD /instructors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $instructors = $this->instructorsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($instructors->toArray(), 'Instructors retrieved successfully');
    }

    /**
     * Store a newly created instructors in storage.
     * POST /instructors
     *
     * @param CreateinstructorsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinstructorsAPIRequest $request)
    {
        $input = $request->all();

        $instructors = $this->instructorsRepository->create($input);

        return $this->sendResponse($instructors->toArray(), 'Instructors saved successfully');
    }

    /**
     * Display the specified instructors.
     * GET|HEAD /instructors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var instructors $instructors */
        $instructors = $this->instructorsRepository->find($id);

        if (empty($instructors)) {
            return $this->sendError('Instructors not found');
        }

        return $this->sendResponse($instructors->toArray(), 'Instructors retrieved successfully');
    }

    /**
     * Update the specified instructors in storage.
     * PUT/PATCH /instructors/{id}
     *
     * @param int $id
     * @param UpdateinstructorsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstructorsAPIRequest $request)
    {
        $input = $request->all();

        /** @var instructors $instructors */
        $instructors = $this->instructorsRepository->find($id);

        if (empty($instructors)) {
            return $this->sendError('Instructors not found');
        }

        $instructors = $this->instructorsRepository->update($input, $id);

        return $this->sendResponse($instructors->toArray(), 'instructors updated successfully');
    }

    /**
     * Remove the specified instructors from storage.
     * DELETE /instructors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var instructors $instructors */
        $instructors = $this->instructorsRepository->find($id);

        if (empty($instructors)) {
            return $this->sendError('Instructors not found');
        }

        $instructors->delete();

        return $this->sendSuccess('Instructors deleted successfully');
    }
}
