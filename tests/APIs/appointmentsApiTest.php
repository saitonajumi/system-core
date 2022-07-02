<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\appointments;

class appointmentsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_appointments()
    {
        $appointments = appointments::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/appointments', $appointments
        );

        $this->assertApiResponse($appointments);
    }

    /**
     * @test
     */
    public function test_read_appointments()
    {
        $appointments = appointments::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/appointments/'.$appointments->id
        );

        $this->assertApiResponse($appointments->toArray());
    }

    /**
     * @test
     */
    public function test_update_appointments()
    {
        $appointments = appointments::factory()->create();
        $editedappointments = appointments::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/appointments/'.$appointments->id,
            $editedappointments
        );

        $this->assertApiResponse($editedappointments);
    }

    /**
     * @test
     */
    public function test_delete_appointments()
    {
        $appointments = appointments::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/appointments/'.$appointments->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/appointments/'.$appointments->id
        );

        $this->response->assertStatus(404);
    }
}
