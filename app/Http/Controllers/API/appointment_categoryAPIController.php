<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createappointment_categoryAPIRequest;
use App\Http\Requests\API\Updateappointment_categoryAPIRequest;
use App\Models\appointment_category;
use App\Repositories\appointment_categoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class appointment_categoryController
 * @package App\Http\Controllers\API
 */

class appointment_categoryAPIController extends AppBaseController
{
    /** @var  appointment_categoryRepository */
    private $appointmentCategoryRepository;

    public function __construct(appointment_categoryRepository $appointmentCategoryRepo)
    {
        $this->appointmentCategoryRepository = $appointmentCategoryRepo;
    }

    /**
     * Display a listing of the appointment_category.
     * GET|HEAD /appointmentCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $appointmentCategories = $this->appointmentCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($appointmentCategories->toArray(), 'Appointment Categories retrieved successfully');
    }

    /**
     * Store a newly created appointment_category in storage.
     * POST /appointmentCategories
     *
     * @param Createappointment_categoryAPIRequest $request
     *
     * @return Response
     */
    public function store(Createappointment_categoryAPIRequest $request)
    {
        $input = $request->all();

        $appointmentCategory = $this->appointmentCategoryRepository->create($input);

        return $this->sendResponse($appointmentCategory->toArray(), 'Appointment Category saved successfully');
    }

    /**
     * Display the specified appointment_category.
     * GET|HEAD /appointmentCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var appointment_category $appointmentCategory */
        $appointmentCategory = $this->appointmentCategoryRepository->find($id);

        if (empty($appointmentCategory)) {
            return $this->sendError('Appointment Category not found');
        }

        return $this->sendResponse($appointmentCategory->toArray(), 'Appointment Category retrieved successfully');
    }

    /**
     * Update the specified appointment_category in storage.
     * PUT/PATCH /appointmentCategories/{id}
     *
     * @param int $id
     * @param Updateappointment_categoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateappointment_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var appointment_category $appointmentCategory */
        $appointmentCategory = $this->appointmentCategoryRepository->find($id);

        if (empty($appointmentCategory)) {
            return $this->sendError('Appointment Category not found');
        }

        $appointmentCategory = $this->appointmentCategoryRepository->update($input, $id);

        return $this->sendResponse($appointmentCategory->toArray(), 'appointment_category updated successfully');
    }

    /**
     * Remove the specified appointment_category from storage.
     * DELETE /appointmentCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var appointment_category $appointmentCategory */
        $appointmentCategory = $this->appointmentCategoryRepository->find($id);

        if (empty($appointmentCategory)) {
            return $this->sendError('Appointment Category not found');
        }

        $appointmentCategory->delete();

        return $this->sendSuccess('Appointment Category deleted successfully');
    }
}
