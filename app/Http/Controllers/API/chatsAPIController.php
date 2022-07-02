<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatechatsAPIRequest;
use App\Http\Requests\API\UpdatechatsAPIRequest;
use App\Models\chats;
use App\Repositories\chatsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class chatsController
 * @package App\Http\Controllers\API
 */

class chatsAPIController extends AppBaseController
{
    /** @var  chatsRepository */
    private $chatsRepository;

    public function __construct(chatsRepository $chatsRepo)
    {
        $this->chatsRepository = $chatsRepo;
    }

    /**
     * Display a listing of the chats.
     * GET|HEAD /chats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $chats = $this->chatsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($chats->toArray(), 'Chats retrieved successfully');
    }

    /**
     * Store a newly created chats in storage.
     * POST /chats
     *
     * @param CreatechatsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatechatsAPIRequest $request)
    {
        $input = $request->all();

        $chats = $this->chatsRepository->create($input);

        return $this->sendResponse($chats->toArray(), 'Chats saved successfully');
    }

    /**
     * Display the specified chats.
     * GET|HEAD /chats/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var chats $chats */
        $chats = $this->chatsRepository->find($id);

        if (empty($chats)) {
            return $this->sendError('Chats not found');
        }

        return $this->sendResponse($chats->toArray(), 'Chats retrieved successfully');
    }

    /**
     * Update the specified chats in storage.
     * PUT/PATCH /chats/{id}
     *
     * @param int $id
     * @param UpdatechatsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatechatsAPIRequest $request)
    {
        $input = $request->all();

        /** @var chats $chats */
        $chats = $this->chatsRepository->find($id);

        if (empty($chats)) {
            return $this->sendError('Chats not found');
        }

        $chats = $this->chatsRepository->update($input, $id);

        return $this->sendResponse($chats->toArray(), 'chats updated successfully');
    }

    /**
     * Remove the specified chats from storage.
     * DELETE /chats/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var chats $chats */
        $chats = $this->chatsRepository->find($id);

        if (empty($chats)) {
            return $this->sendError('Chats not found');
        }

        $chats->delete();

        return $this->sendSuccess('Chats deleted successfully');
    }
}
