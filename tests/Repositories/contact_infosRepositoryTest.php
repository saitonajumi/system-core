<?php namespace Tests\Repositories;

use App\Models\contact_infos;
use App\Repositories\contact_infosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class contact_infosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var contact_infosRepository
     */
    protected $contactInfosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contactInfosRepo = \App::make(contact_infosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contact_infos()
    {
        $contactInfos = contact_infos::factory()->make()->toArray();

        $createdcontact_infos = $this->contactInfosRepo->create($contactInfos);

        $createdcontact_infos = $createdcontact_infos->toArray();
        $this->assertArrayHasKey('id', $createdcontact_infos);
        $this->assertNotNull($createdcontact_infos['id'], 'Created contact_infos must have id specified');
        $this->assertNotNull(contact_infos::find($createdcontact_infos['id']), 'contact_infos with given id must be in DB');
        $this->assertModelData($contactInfos, $createdcontact_infos);
    }

    /**
     * @test read
     */
    public function test_read_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();

        $dbcontact_infos = $this->contactInfosRepo->find($contactInfos->id);

        $dbcontact_infos = $dbcontact_infos->toArray();
        $this->assertModelData($contactInfos->toArray(), $dbcontact_infos);
    }

    /**
     * @test update
     */
    public function test_update_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();
        $fakecontact_infos = contact_infos::factory()->make()->toArray();

        $updatedcontact_infos = $this->contactInfosRepo->update($fakecontact_infos, $contactInfos->id);

        $this->assertModelData($fakecontact_infos, $updatedcontact_infos->toArray());
        $dbcontact_infos = $this->contactInfosRepo->find($contactInfos->id);
        $this->assertModelData($fakecontact_infos, $dbcontact_infos->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contact_infos()
    {
        $contactInfos = contact_infos::factory()->create();

        $resp = $this->contactInfosRepo->delete($contactInfos->id);

        $this->assertTrue($resp);
        $this->assertNull(contact_infos::find($contactInfos->id), 'contact_infos should not exist in DB');
    }
}
