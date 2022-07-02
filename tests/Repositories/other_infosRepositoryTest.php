<?php namespace Tests\Repositories;

use App\Models\other_infos;
use App\Repositories\other_infosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class other_infosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var other_infosRepository
     */
    protected $otherInfosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->otherInfosRepo = \App::make(other_infosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_other_infos()
    {
        $otherInfos = other_infos::factory()->make()->toArray();

        $createdother_infos = $this->otherInfosRepo->create($otherInfos);

        $createdother_infos = $createdother_infos->toArray();
        $this->assertArrayHasKey('id', $createdother_infos);
        $this->assertNotNull($createdother_infos['id'], 'Created other_infos must have id specified');
        $this->assertNotNull(other_infos::find($createdother_infos['id']), 'other_infos with given id must be in DB');
        $this->assertModelData($otherInfos, $createdother_infos);
    }

    /**
     * @test read
     */
    public function test_read_other_infos()
    {
        $otherInfos = other_infos::factory()->create();

        $dbother_infos = $this->otherInfosRepo->find($otherInfos->id);

        $dbother_infos = $dbother_infos->toArray();
        $this->assertModelData($otherInfos->toArray(), $dbother_infos);
    }

    /**
     * @test update
     */
    public function test_update_other_infos()
    {
        $otherInfos = other_infos::factory()->create();
        $fakeother_infos = other_infos::factory()->make()->toArray();

        $updatedother_infos = $this->otherInfosRepo->update($fakeother_infos, $otherInfos->id);

        $this->assertModelData($fakeother_infos, $updatedother_infos->toArray());
        $dbother_infos = $this->otherInfosRepo->find($otherInfos->id);
        $this->assertModelData($fakeother_infos, $dbother_infos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_other_infos()
    {
        $otherInfos = other_infos::factory()->create();

        $resp = $this->otherInfosRepo->delete($otherInfos->id);

        $this->assertTrue($resp);
        $this->assertNull(other_infos::find($otherInfos->id), 'other_infos should not exist in DB');
    }
}
