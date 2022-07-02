<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\other_infos;

class other_infosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_other_infos()
    {
        $otherInfos = other_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/other_infos', $otherInfos
        );

        $this->assertApiResponse($otherInfos);
    }

    /**
     * @test
     */
    public function test_read_other_infos()
    {
        $otherInfos = other_infos::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/other_infos/'.$otherInfos->id
        );

        $this->assertApiResponse($otherInfos->toArray());
    }

    /**
     * @test
     */
    public function test_update_other_infos()
    {
        $otherInfos = other_infos::factory()->create();
        $editedother_infos = other_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/other_infos/'.$otherInfos->id,
            $editedother_infos
        );

        $this->assertApiResponse($editedother_infos);
    }

    /**
     * @test
     */
    public function test_delete_other_infos()
    {
        $otherInfos = other_infos::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/other_infos/'.$otherInfos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/other_infos/'.$otherInfos->id
        );

        $this->response->assertStatus(404);
    }
}
