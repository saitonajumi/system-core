<?php namespace Tests\Repositories;

use App\Models\instructors;
use App\Repositories\instructorsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class instructorsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var instructorsRepository
     */
    protected $instructorsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->instructorsRepo = \App::make(instructorsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_instructors()
    {
        $instructors = instructors::factory()->make()->toArray();

        $createdinstructors = $this->instructorsRepo->create($instructors);

        $createdinstructors = $createdinstructors->toArray();
        $this->assertArrayHasKey('id', $createdinstructors);
        $this->assertNotNull($createdinstructors['id'], 'Created instructors must have id specified');
        $this->assertNotNull(instructors::find($createdinstructors['id']), 'instructors with given id must be in DB');
        $this->assertModelData($instructors, $createdinstructors);
    }

    /**
     * @test read
     */
    public function test_read_instructors()
    {
        $instructors = instructors::factory()->create();

        $dbinstructors = $this->instructorsRepo->find($instructors->id);

        $dbinstructors = $dbinstructors->toArray();
        $this->assertModelData($instructors->toArray(), $dbinstructors);
    }

    /**
     * @test update
     */
    public function test_update_instructors()
    {
        $instructors = instructors::factory()->create();
        $fakeinstructors = instructors::factory()->make()->toArray();

        $updatedinstructors = $this->instructorsRepo->update($fakeinstructors, $instructors->id);

        $this->assertModelData($fakeinstructors, $updatedinstructors->toArray());
        $dbinstructors = $this->instructorsRepo->find($instructors->id);
        $this->assertModelData($fakeinstructors, $dbinstructors->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_instructors()
    {
        $instructors = instructors::factory()->create();

        $resp = $this->instructorsRepo->delete($instructors->id);

        $this->assertTrue($resp);
        $this->assertNull(instructors::find($instructors->id), 'instructors should not exist in DB');
    }
}
