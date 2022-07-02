<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\contact_infos;

class contact_infosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contact_infos()
    {
        $contactInfos = contact_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contact_infos', $contactInfos
        );

        $this->assertApiResponse($contactInfos);
    }

    /**
     * @test
     */
    public function test_read_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/contact_infos/'.$contactInfos->id
        );

        $this->assertApiResponse($contactInfos->toArray());
    }

    /**
     * @test
     */
    public function test_update_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();
        $editedcontact_infos = contact_infos::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contact_infos/'.$contactInfos->id,
            $editedcontact_infos
        );

        $this->assertApiResponse($editedcontact_infos);
    }

    /**
     * @test
     */
    public function test_delete_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contact_infos/'.$contactInfos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contact_infos/'.$contactInfos->id
        );

        $this->response->assertStatus(404);
    }
}
