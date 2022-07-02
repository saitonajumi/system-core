<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\new_features;

class new_featuresApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_new_features()
    {
        $newFeatures = new_features::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/new_features', $newFeatures
        );

        $this->assertApiResponse($newFeatures);
    }

    /**
     * @test
     */
    public function test_read_new_features()
    {
        $newFeatures = new_features::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/new_features/'.$newFeatures->id
        );

        $this->assertApiResponse($newFeatures->toArray());
    }

    /**
     * @test
     */
    public function test_update_new_features()
    {
        $newFeatures = new_features::factory()->create();
        $editednew_features = new_features::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/new_features/'.$newFeatures->id,
            $editednew_features
        );

        $this->assertApiResponse($editednew_features);
    }

    /**
     * @test
     */
    public function test_delete_new_features()
    {
        $newFeatures = new_features::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/new_features/'.$newFeatures->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/new_features/'.$newFeatures->id
        );

        $this->response->assertStatus(404);
    }
}
