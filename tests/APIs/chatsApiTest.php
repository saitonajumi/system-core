<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chats;

class chatsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chats()
    {
        $chats = chats::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chats', $chats
        );

        $this->assertApiResponse($chats);
    }

    /**
     * @test
     */
    public function test_read_chats()
    {
        $chats = chats::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chats/'.$chats->id
        );

        $this->assertApiResponse($chats->toArray());
    }

    /**
     * @test
     */
    public function test_update_chats()
    {
        $chats = chats::factory()->create();
        $editedchats = chats::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chats/'.$chats->id,
            $editedchats
        );

        $this->assertApiResponse($editedchats);
    }

    /**
     * @test
     */
    public function test_delete_chats()
    {
        $chats = chats::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chats/'.$chats->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chats/'.$chats->id
        );

        $this->response->assertStatus(404);
    }
}
