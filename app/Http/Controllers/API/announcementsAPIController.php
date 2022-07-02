<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateannouncementsAPIRequest;
use App\Http\Requests\API\UpdateannouncementsAPIRequest;
use App\Models\announcements;
use App\Repositories\announcementsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class announcementsController
 * @package App\Http\Controllers\API
 */

class announcementsAPIController extends AppBaseController
{
    /** @var  announcementsRepository */
    private $announcementsRepository;

    public function __construct(announcementsRepository $announcementsRepo)
    {
        $this->announcementsRepository = $announcementsRepo;
    }

    /**
     * Display a listing of the announcements.
     * GET|HEAD /announcements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $announcements = $this->announcementsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($announcements->toArray(), 'Announcements retrieved successfully');
    }

    /**
     * Store a newly created announcements in storage.
     * POST /announcements
     *
     * @param CreateannouncementsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateannouncementsAPIRequest $request)
    {
        $input = $request->all();

        $announcements = $this->announcementsRepository->create($input);

        return $this->sendResponse($announcements->toArray(), 'Announcements saved successfully');
    }

    /**
     * Display the specified announcements.
     * GET|HEAD /announcements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var announcements $announcements */
        $announcements = $this->announcementsRepository->find($id);

        if (empty($announcements)) {
            return $this->sendError('Announcements not found');
        }

        return $this->sendResponse($announcements->toArray(), 'Announcements retrieved successfully');
    }

    /**
     * Update the specified announcements in storage.
     * PUT/PATCH /announcements/{id}
     *
     * @param int $id
     * @param UpdateannouncementsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateannouncementsAPIRequest $request)
    {
        $input = $request->all();

        /** @var announcements $announcements */
        $announcements = $this->announcementsRepository->find($id);

        if (empty($announcements)) {
            return $this->sendError('Announcements not found');
        }

        $announcements = $this->announcementsRepository->update($input, $id);

        return $this->sendResponse($announcements->toArray(), 'announcements updated successfully');
    }

    /**
     * Remove the specified announcements from storage.
     * DELETE /announcements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var announcements $announcements */
        $announcements = $this->announcementsRepository->find($id);

        if (empty($announcements)) {
            return $this->sendError('Announcements not found');
        }

        $announcements->delete();

        return $this->sendSuccess('Announcements deleted successfully');
    }
}
