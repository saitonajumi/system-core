<?php namespace Tests\Repositories;

use App\Models\guidances;
use App\Repositories\guidancesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class guidancesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var guidancesRepository
     */
    protected $guidancesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->guidancesRepo = \App::make(guidancesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_guidances()
    {
        $guidances = guidances::factory()->make()->toArray();

        $createdguidances = $this->guidancesRepo->create($guidances);

        $createdguidances = $createdguidances->toArray();
        $this->assertArrayHasKey('id', $createdguidances);
        $this->assertNotNull($createdguidances['id'], 'Created guidances must have id specified');
        $this->assertNotNull(guidances::find($createdguidances['id']), 'guidances with given id must be in DB');
        $this->assertModelData($guidances, $createdguidances);
    }

    /**
     * @test read
     */
    public function test_read_guidances()
    {
        $guidances = guidances::factory()->create();

        $dbguidances = $this->guidancesRepo->find($guidances->id);

        $dbguidances = $dbguidances->toArray();
        $this->assertModelData($guidances->toArray(), $dbguidances);
    }

    /**
     * @test update
     */
    public function test_update_guidances()
    {
        $guidances = guidances::factory()->create();
        $fakeguidances = guidances::factory()->make()->toArray();

        $updatedguidances = $this->guidancesRepo->update($fakeguidances, $guidances->id);

        $this->assertModelData($fakeguidances, $updatedguidances->toArray());
        $dbguidances = $this->guidancesRepo->find($guidances->id);
        $this->assertModelData($fakeguidances, $dbguidances->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_guidances()
    {
        $guidances = guidances::factory()->create();

        $resp = $this->guidancesRepo->delete($guidances->id);

        $this->assertTrue($resp);
        $this->assertNull(guidances::find($guidances->id), 'guidances should not exist in DB');
    }
}
