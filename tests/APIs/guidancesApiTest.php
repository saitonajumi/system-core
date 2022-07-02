<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\guidances;

class guidancesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_guidances()
    {
        $guidances = guidances::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/guidances', $guidances
        );

        $this->assertApiResponse($guidances);
    }

    /**
     * @test
     */
    public function test_read_guidances()
    {
        $guidances = guidances::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/guidances/'.$guidances->id
        );

        $this->assertApiResponse($guidances->toArray());
    }

    /**
     * @test
     */
    public function test_update_guidances()
    {
        $guidances = guidances::factory()->create();
        $editedguidances = guidances::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/guidances/'.$guidances->id,
            $editedguidances
        );

        $this->assertApiResponse($editedguidances);
    }

    /**
     * @test
     */
    public function test_delete_guidances()
    {
        $guidances = guidances::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/guidances/'.$guidances->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/guidances/'.$guidances->id
        );

        $this->response->assertStatus(404);
    }
}
