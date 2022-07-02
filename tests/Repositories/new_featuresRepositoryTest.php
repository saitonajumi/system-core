<?php namespace Tests\Repositories;

use App\Models\new_features;
use App\Repositories\new_featuresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class new_featuresRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var new_featuresRepository
     */
    protected $newFeaturesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->newFeaturesRepo = \App::make(new_featuresRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_new_features()
    {
        $newFeatures = new_features::factory()->make()->toArray();

        $creatednew_features = $this->newFeaturesRepo->create($newFeatures);

        $creatednew_features = $creatednew_features->toArray();
        $this->assertArrayHasKey('id', $creatednew_features);
        $this->assertNotNull($creatednew_features['id'], 'Created new_features must have id specified');
        $this->assertNotNull(new_features::find($creatednew_features['id']), 'new_features with given id must be in DB');
        $this->assertModelData($newFeatures, $creatednew_features);
    }

    /**
     * @test read
     */
    public function test_read_new_features()
    {
        $newFeatures = new_features::factory()->create();

        $dbnew_features = $this->newFeaturesRepo->find($newFeatures->id);

        $dbnew_features = $dbnew_features->toArray();
        $this->assertModelData($newFeatures->toArray(), $dbnew_features);
    }

    /**
     * @test update
     */
    public function test_update_new_features()
    {
        $newFeatures = new_features::factory()->create();
        $fakenew_features = new_features::factory()->make()->toArray();

        $updatednew_features = $this->newFeaturesRepo->update($fakenew_features, $newFeatures->id);

        $this->assertModelData($fakenew_features, $updatednew_features->toArray());
        $dbnew_features = $this->newFeaturesRepo->find($newFeatures->id);
        $this->assertModelData($fakenew_features, $dbnew_features->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_new_features()
    {
        $newFeatures = new_features::factory()->create();

        $resp = $this->newFeaturesRepo->delete($newFeatures->id);

        $this->assertTrue($resp);
        $this->assertNull(new_features::find($newFeatures->id), 'new_features should not exist in DB');
    }
}
