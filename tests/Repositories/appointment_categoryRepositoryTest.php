<?php namespace Tests\Repositories;

use App\Models\appointment_category;
use App\Repositories\appointment_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class appointment_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var appointment_categoryRepository
     */
    protected $appointmentCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->appointmentCategoryRepo = \App::make(appointment_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->make()->toArray();

        $createdappointment_category = $this->appointmentCategoryRepo->create($appointmentCategory);

        $createdappointment_category = $createdappointment_category->toArray();
        $this->assertArrayHasKey('id', $createdappointment_category);
        $this->assertNotNull($createdappointment_category['id'], 'Created appointment_category must have id specified');
        $this->assertNotNull(appointment_category::find($createdappointment_category['id']), 'appointment_category with given id must be in DB');
        $this->assertModelData($appointmentCategory, $createdappointment_category);
    }

    /**
     * @test read
     */
    public function test_read_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();

        $dbappointment_category = $this->appointmentCategoryRepo->find($appointmentCategory->id);

        $dbappointment_category = $dbappointment_category->toArray();
        $this->assertModelData($appointmentCategory->toArray(), $dbappointment_category);
    }

    /**
     * @test update
     */
    public function test_update_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();
        $fakeappointment_category = appointment_category::factory()->make()->toArray();

        $updatedappointment_category = $this->appointmentCategoryRepo->update($fakeappointment_category, $appointmentCategory->id);

        $this->assertModelData($fakeappointment_category, $updatedappointment_category->toArray());
        $dbappointment_category = $this->appointmentCategoryRepo->find($appointmentCategory->id);
        $this->assertModelData($fakeappointment_category, $dbappointment_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_appointment_category()
    {
        $appointmentCategory = appointment_category::factory()->create();

        $resp = $this->appointmentCategoryRepo->delete($appointmentCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(appointment_category::find($appointmentCategory->id), 'appointment_category should not exist in DB');
    }
}
