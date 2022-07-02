<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\announcements;

class announcementsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_announcements()
    {
        $announcements = announcements::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/announcements', $announcements
        );

        $this->assertApiResponse($announcements);
    }

    /**
     * @test
     */
    public function test_read_announcements()
    {
        $announcements = announcements::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/announcements/'.$announcements->id
        );

        $this->assertApiResponse($announcements->toArray());
    }

    /**
     * @test
     */
    public function test_update_announcements()
    {
        $announcements = announcements::factory()->create();
        $editedannouncements = announcements::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/announcements/'.$announcements->id,
            $editedannouncements
        );

        $this->assertApiResponse($editedannouncements);
    }

    /**
     * @test
     */
    public function test_delete_announcements()
    {
        $announcements = announcements::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/announcements/'.$announcements->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/announcements/'.$announcements->id
        );

        $this->response->assertStatus(404);
    }
}
