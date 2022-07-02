<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createchat_roomsAPIRequest;
use App\Http\Requests\API\Updatechat_roomsAPIRequest;
use App\Models\chat_rooms;
use App\Repositories\chat_roomsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class chat_roomsController
 * @package App\Http\Controllers\API
 */

class chat_roomsAPIController extends AppBaseController
{
    /** @var  chat_roomsRepository */
    private $chatRoomsRepository;

    public function __construct(chat_roomsRepository $chatRoomsRepo)
    {
        $this->chatRoomsRepository = $chatRoomsRepo;
    }

    /**
     * Display a listing of the chat_rooms.
     * GET|HEAD /chatRooms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $chatRooms = $this->chatRoomsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($chatRooms->toArray(), 'Chat Rooms retrieved successfully');
    }

    /**
     * Store a newly created chat_rooms in storage.
     * POST /chatRooms
     *
     * @param Createchat_roomsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createchat_roomsAPIRequest $request)
    {
        $input = $request->all();

        $chatRooms = $this->chatRoomsRepository->create($input);

        return $this->sendResponse($chatRooms->toArray(), 'Chat Rooms saved successfully');
    }

    /**
     * Display the specified chat_rooms.
     * GET|HEAD /chatRooms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var chat_rooms $chatRooms */
        $chatRooms = $this->chatRoomsRepository->find($id);

        if (empty($chatRooms)) {
            return $this->sendError('Chat Rooms not found');
        }

        return $this->sendResponse($chatRooms->toArray(), 'Chat Rooms retrieved successfully');
    }

    /**
     * Update the specified chat_rooms in storage.
     * PUT/PATCH /chatRooms/{id}
     *
     * @param int $id
     * @param Updatechat_roomsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatechat_roomsAPIRequest $request)
    {
        $input = $request->all();

        /** @var chat_rooms $chatRooms */
        $chatRooms = $this->chatRoomsRepository->find($id);

        if (empty($chatRooms)) {
            return $this->sendError('Chat Rooms not found');
        }

        $chatRooms = $this->chatRoomsRepository->update($input, $id);

        return $this->sendResponse($chatRooms->toArray(), 'chat_rooms updated successfully');
    }

    /**
     * Remove the specified chat_rooms from storage.
     * DELETE /chatRooms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var chat_rooms $chatRooms */
        $chatRooms = $this->chatRoomsRepository->find($id);

        if (empty($chatRooms)) {
            return $this->sendError('Chat Rooms not found');
        }

        $chatRooms->delete();

        return $this->sendSuccess('Chat Rooms deleted successfully');
    }
}
