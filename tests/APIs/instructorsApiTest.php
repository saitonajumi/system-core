<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\instructors;

class instructorsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_instructors()
    {
        $instructors = instructors::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/instructors', $instructors
        );

        $this->assertApiResponse($instructors);
    }

    /**
     * @test
     */
    public function test_read_instructors()
    {
        $instructors = instructors::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/instructors/'.$instructors->id
        );

        $this->assertApiResponse($instructors->toArray());
    }

    /**
     * @test
     */
    public function test_update_instructors()
    {
        $instructors = instructors::factory()->create();
        $editedinstructors = instructors::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/instructors/'.$instructors->id,
            $editedinstructors
        );

        $this->assertApiResponse($editedinstructors);
    }

    /**
     * @test
     */
    public function test_delete_instructors()
    {
        $instructors = instructors::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/instructors/'.$instructors->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/instructors/'.$instructors->id
        );

        $this->response->assertStatus(404);
    }
}
