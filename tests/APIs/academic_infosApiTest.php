<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\academic_infos;

class academic_infosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_academic_infos()
    {
        $academicInfos = academic_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/academic_infos', $academicInfos
        );

        $this->assertApiResponse($academicInfos);
    }

    /**
     * @test
     */
    public function test_read_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/academic_infos/'.$academicInfos->id
        );

        $this->assertApiResponse($academicInfos->toArray());
    }

    /**
     * @test
     */
    public function test_update_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();
        $editedacademic_infos = academic_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/academic_infos/'.$academicInfos->id,
            $editedacademic_infos
        );

        $this->assertApiResponse($editedacademic_infos);
    }

    /**
     * @test
     */
    public function test_delete_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/academic_infos/'.$academicInfos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/academic_infos/'.$academicInfos->id
        );

        $this->response->assertStatus(404);
    }
}
