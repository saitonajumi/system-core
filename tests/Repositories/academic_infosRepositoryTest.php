<?php namespace Tests\Repositories;

use App\Models\academic_infos;
use App\Repositories\academic_infosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class academic_infosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var academic_infosRepository
     */
    protected $academicInfosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->academicInfosRepo = \App::make(academic_infosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_academic_infos()
    {
        $academicInfos = academic_infos::factory()->make()->toArray();

        $createdacademic_infos = $this->academicInfosRepo->create($academicInfos);

        $createdacademic_infos = $createdacademic_infos->toArray();
        $this->assertArrayHasKey('id', $createdacademic_infos);
        $this->assertNotNull($createdacademic_infos['id'], 'Created academic_infos must have id specified');
        $this->assertNotNull(academic_infos::find($createdacademic_infos['id']), 'academic_infos with given id must be in DB');
        $this->assertModelData($academicInfos, $createdacademic_infos);
    }

    /**
     * @test read
     */
    public function test_read_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();

        $dbacademic_infos = $this->academicInfosRepo->find($academicInfos->id);

        $dbacademic_infos = $dbacademic_infos->toArray();
        $this->assertModelData($academicInfos->toArray(), $dbacademic_infos);
    }

    /**
     * @test update
     */
    public function test_update_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();
        $fakeacademic_infos = academic_infos::factory()->make()->toArray();

        $updatedacademic_infos = $this->academicInfosRepo->update($fakeacademic_infos, $academicInfos->id);

        $this->assertModelData($fakeacademic_infos, $updatedacademic_infos->toArray());
        $dbacademic_infos = $this->academicInfosRepo->find($academicInfos->id);
        $this->assertModelData($fakeacademic_infos, $dbacademic_infos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_academic_infos()
    {
        $academicInfos = academic_infos::factory()->create();

        $resp = $this->academicInfosRepo->delete($academicInfos->id);

        $this->assertTrue($resp);
        $this->assertNull(academic_infos::find($academicInfos->id), 'academic_infos should not exist in DB');
    }
}
