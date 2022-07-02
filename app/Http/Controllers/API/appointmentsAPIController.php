<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateappointmentsAPIRequest;
use App\Http\Requests\API\UpdateappointmentsAPIRequest;
use App\Models\appointments;
use App\Repositories\appointmentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class appointmentsController
 * @package App\Http\Controllers\API
 */

class appointmentsAPIController extends AppBaseController
{
    /** @var  appointmentsRepository */
    private $appointmentsRepository;

    public function __construct(appointmentsRepository $appointmentsRepo)
    {
        $this->appointmentsRepository = $appointmentsRepo;
    }

    /**
     * Display a listing of the appointments.
     * GET|HEAD /appointments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $appointments = $this->appointmentsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($appointments->toArray(), 'Appointments retrieved successfully');
    }

    /**
     * Store a newly created appointments in storage.
     * POST /appointments
     *
     * @param CreateappointmentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateappointmentsAPIRequest $request)
    {
        $input = $request->all();

        $appointments = $this->appointmentsRepository->create($input);

        return $this->sendResponse($appointments->toArray(), 'Appointments saved successfully');
    }

    /**
     * Display the specified appointments.
     * GET|HEAD /appointments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var appointments $appointments */
        $appointments = $this->appointmentsRepository->find($id);

        if (empty($appointments)) {
            return $this->sendError('Appointments not found');
        }

        return $this->sendResponse($appointments->toArray(), 'Appointments retrieved successfully');
    }

    /**
     * Update the specified appointments in storage.
     * PUT/PATCH /appointments/{id}
     *
     * @param int $id
     * @param UpdateappointmentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateappointmentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var appointments $appointments */
        $appointments = $this->appointmentsRepository->find($id);

        if (empty($appointments)) {
            return $this->sendError('Appointments not found');
        }

        $appointments = $this->appointmentsRepository->update($input, $id);

        return $this->sendResponse($appointments->toArray(), 'appointments updated successfully');
    }

    /**
     * Remove the specified appointments from storage.
     * DELETE /appointments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var appointments $appointments */
        $appointments = $this->appointmentsRepository->find($id);

        if (empty($appointments)) {
            return $this->sendError('Appointments not found');
        }

        $appointments->delete();

        return $this->sendSuccess('Appointments deleted successfully');
    }
}
