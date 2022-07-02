<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\applications;

class applicationsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_applications()
    {
        $applications = applications::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/applications', $applications
        );

        $this->assertApiResponse($applications);
    }

    /**
     * @test
     */
    public function test_read_applications()
    {
        $applications = applications::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/applications/'.$applications->id
        );

        $this->assertApiResponse($applications->toArray());
    }

    /**
     * @test
     */
    public function test_update_applications()
    {
        $applications = applications::factory()->create();
        $editedapplications = applications::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/applications/'.$applications->id,
            $editedapplications
        );

        $this->assertApiResponse($editedapplications);
    }

    /**
     * @test
     */
    public function test_delete_applications()
    {
        $applications = applications::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/applications/'.$applications->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/applications/'.$applications->id
        );

        $this->response->assertStatus(404);
    }
}
