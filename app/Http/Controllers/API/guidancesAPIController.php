<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateguidancesAPIRequest;
use App\Http\Requests\API\UpdateguidancesAPIRequest;
use App\Models\guidances;
use App\Repositories\guidancesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class guidancesController
 * @package App\Http\Controllers\API
 */

class guidancesAPIController extends AppBaseController
{
    /** @var  guidancesRepository */
    private $guidancesRepository;

    public function __construct(guidancesRepository $guidancesRepo)
    {
        $this->guidancesRepository = $guidancesRepo;
    }

    /**
     * Display a listing of the guidances.
     * GET|HEAD /guidances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $guidances = $this->guidancesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($guidances->toArray(), 'Guidances retrieved successfully');
    }

    /**
     * Store a newly created guidances in storage.
     * POST /guidances
     *
     * @param CreateguidancesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateguidancesAPIRequest $request)
    {
        $input = $request->all();

        $guidances = $this->guidancesRepository->create($input);

        return $this->sendResponse($guidances->toArray(), 'Guidances saved successfully');
    }

    /**
     * Display the specified guidances.
     * GET|HEAD /guidances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var guidances $guidances */
        $guidances = $this->guidancesRepository->find($id);

        if (empty($guidances)) {
            return $this->sendError('Guidances not found');
        }

        return $this->sendResponse($guidances->toArray(), 'Guidances retrieved successfully');
    }

    /**
     * Update the specified guidances in storage.
     * PUT/PATCH /guidances/{id}
     *
     * @param int $id
     * @param UpdateguidancesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateguidancesAPIRequest $request)
    {
        $input = $request->all();

        /** @var guidances $guidances */
        $guidances = $this->guidancesRepository->find($id);

        if (empty($guidances)) {
            return $this->sendError('Guidances not found');
        }

        $guidances = $this->guidancesRepository->update($input, $id);

        return $this->sendResponse($guidances->toArray(), 'guidances updated successfully');
    }

    /**
     * Remove the specified guidances from storage.
     * DELETE /guidances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var guidances $guidances */
        $guidances = $this->guidancesRepository->find($id);

        if (empty($guidances)) {
            return $this->sendError('Guidances not found');
        }

        $guidances->delete();

        return $this->sendSuccess('Guidances deleted successfully');
    }
}
