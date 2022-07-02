<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_rooms;

class chat_roomsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_rooms', $chatRooms
        );

        $this->assertApiResponse($chatRooms);
    }

    /**
     * @test
     */
    public function test_read_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_rooms/'.$chatRooms->id
        );

        $this->assertApiResponse($chatRooms->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();
        $editedchat_rooms = chat_rooms::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_rooms/'.$chatRooms->id,
            $editedchat_rooms
        );

        $this->assertApiResponse($editedchat_rooms);
    }

    /**
     * @test
     */
    public function test_delete_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_rooms/'.$chatRooms->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_rooms/'.$chatRooms->id
        );

        $this->response->assertStatus(404);
    }
}
