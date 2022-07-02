<?php namespace Tests\Repositories;

use App\Models\applications;
use App\Repositories\applicationsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class applicationsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var applicationsRepository
     */
    protected $applicationsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->applicationsRepo = \App::make(applicationsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_applications()
    {
        $applications = applications::factory()->make()->toArray();

        $createdapplications = $this->applicationsRepo->create($applications);

        $createdapplications = $createdapplications->toArray();
        $this->assertArrayHasKey('id', $createdapplications);
        $this->assertNotNull($createdapplications['id'], 'Created applications must have id specified');
        $this->assertNotNull(applications::find($createdapplications['id']), 'applications with given id must be in DB');
        $this->assertModelData($applications, $createdapplications);
    }

    /**
     * @test read
     */
    public function test_read_applications()
    {
        $applications = applications::factory()->create();

        $dbapplications = $this->applicationsRepo->find($applications->id);

        $dbapplications = $dbapplications->toArray();
        $this->assertModelData($applications->toArray(), $dbapplications);
    }

    /**
     * @test update
     */
    public function test_update_applications()
    {
        $applications = applications::factory()->create();
        $fakeapplications = applications::factory()->make()->toArray();

        $updatedapplications = $this->applicationsRepo->update($fakeapplications, $applications->id);

        $this->assertModelData($fakeapplications, $updatedapplications->toArray());
        $dbapplications = $this->applicationsRepo->find($applications->id);
        $this->assertModelData($fakeapplications, $dbapplications->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_applications()
    {
        $applications = applications::factory()->create();

        $resp = $this->applicationsRepo->delete($applications->id);

        $this->assertTrue($resp);
        $this->assertNull(applications::find($applications->id), 'applications should not exist in DB');
    }
}
