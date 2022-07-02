<?php namespace Tests\Repositories;

use App\Models\announcements;
use App\Repositories\announcementsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class announcementsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var announcementsRepository
     */
    protected $announcementsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->announcementsRepo = \App::make(announcementsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_announcements()
    {
        $announcements = announcements::factory()->make()->toArray();

        $createdannouncements = $this->announcementsRepo->create($announcements);

        $createdannouncements = $createdannouncements->toArray();
        $this->assertArrayHasKey('id', $createdannouncements);
        $this->assertNotNull($createdannouncements['id'], 'Created announcements must have id specified');
        $this->assertNotNull(announcements::find($createdannouncements['id']), 'announcements with given id must be in DB');
        $this->assertModelData($announcements, $createdannouncements);
    }

    /**
     * @test read
     */
    public function test_read_announcements()
    {
        $announcements = announcements::factory()->create();

        $dbannouncements = $this->announcementsRepo->find($announcements->id);

        $dbannouncements = $dbannouncements->toArray();
        $this->assertModelData($announcements->toArray(), $dbannouncements);
    }

    /**
     * @test update
     */
    public function test_update_announcements()
    {
        $announcements = announcements::factory()->create();
        $fakeannouncements = announcements::factory()->make()->toArray();

        $updatedannouncements = $this->announcementsRepo->update($fakeannouncements, $announcements->id);

        $this->assertModelData($fakeannouncements, $updatedannouncements->toArray());
        $dbannouncements = $this->announcementsRepo->find($announcements->id);
        $this->assertModelData($fakeannouncements, $dbannouncements->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_announcements()
    {
        $announcements = announcements::factory()->create();

        $resp = $this->announcementsRepo->delete($announcements->id);

        $this->assertTrue($resp);
        $this->assertNull(announcements::find($announcements->id), 'announcements should not exist in DB');
    }
}
