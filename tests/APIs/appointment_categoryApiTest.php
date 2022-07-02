<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\appointment_category;

class appointment_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/appointment_categories', $appointmentCategory
        );

        $this->assertApiResponse($appointmentCategory);
    }

    /**
     * @test
     */
    public function test_read_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/appointment_categories/'.$appointmentCategory->id
        );

        $this->assertApiResponse($appointmentCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();
        $editedappointment_category = appointment_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/appointment_categories/'.$appointmentCategory->id,
            $editedappointment_category
        );

        $this->assertApiResponse($editedappointment_category);
    }

    /**
     * @test
     */
    public function test_delete_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/appointment_categories/'.$appointmentCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/appointment_categories/'.$appointmentCategory->id
        );

        $this->response->assertStatus(404);
    }
}
