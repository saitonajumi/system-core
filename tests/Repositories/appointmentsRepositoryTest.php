<?php namespace Tests\Repositories;

use App\Models\appointments;
use App\Repositories\appointmentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class appointmentsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var appointmentsRepository
     */
    protected $appointmentsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->appointmentsRepo = \App::make(appointmentsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_appointments()
    {
        $appointments = appointments::factory()->make()->toArray();

        $createdappointments = $this->appointmentsRepo->create($appointments);

        $createdappointments = $createdappointments->toArray();
        $this->assertArrayHasKey('id', $createdappointments);
        $this->assertNotNull($createdappointments['id'], 'Created appointments must have id specified');
        $this->assertNotNull(appointments::find($createdappointments['id']), 'appointments with given id must be in DB');
        $this->assertModelData($appointments, $createdappointments);
    }

    /**
     * @test read
     */
    public function test_read_appointments()
    {
        $appointments = appointments::factory()->create();

        $dbappointments = $this->appointmentsRepo->find($appointments->id);

        $dbappointments = $dbappointments->toArray();
        $this->assertModelData($appointments->toArray(), $dbappointments);
    }

    /**
     * @test update
     */
    public function test_update_appointments()
    {
        $appointments = appointments::factory()->create();
        $fakeappointments = appointments::factory()->make()->toArray();

        $updatedappointments = $this->appointmentsRepo->update($fakeappointments, $appointments->id);

        $this->assertModelData($fakeappointments, $updatedappointments->toArray());
        $dbappointments = $this->appointmentsRepo->find($appointments->id);
        $this->assertModelData($fakeappointments, $dbappointments->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_appointments()
    {
        $appointments = appointments::factory()->create();

        $resp = $this->appointmentsRepo->delete($appointments->id);

        $this->assertTrue($resp);
        $this->assertNull(appointments::find($appointments->id), 'appointments should not exist in DB');
    }
}
