<?php namespace Tests\Repositories;

use App\Models\chats;
use App\Repositories\chatsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chatsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chatsRepository
     */
    protected $chatsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatsRepo = \App::make(chatsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chats()
    {
        $chats = chats::factory()->make()->toArray();

        $createdchats = $this->chatsRepo->create($chats);

        $createdchats = $createdchats->toArray();
        $this->assertArrayHasKey('id', $createdchats);
        $this->assertNotNull($createdchats['id'], 'Created chats must have id specified');
        $this->assertNotNull(chats::find($createdchats['id']), 'chats with given id must be in DB');
        $this->assertModelData($chats, $createdchats);
    }

    /**
     * @test read
     */
    public function test_read_chats()
    {
        $chats = chats::factory()->create();

        $dbchats = $this->chatsRepo->find($chats->id);

        $dbchats = $dbchats->toArray();
        $this->assertModelData($chats->toArray(), $dbchats);
    }

    /**
     * @test update
     */
    public function test_update_chats()
    {
        $chats = chats::factory()->create();
        $fakechats = chats::factory()->make()->toArray();

        $updatedchats = $this->chatsRepo->update($fakechats, $chats->id);

        $this->assertModelData($fakechats, $updatedchats->toArray());
        $dbchats = $this->chatsRepo->find($chats->id);
        $this->assertModelData($fakechats, $dbchats->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chats()
    {
        $chats = chats::factory()->create();

        $resp = $this->chatsRepo->delete($chats->id);

        $this->assertTrue($resp);
        $this->assertNull(chats::find($chats->id), 'chats should not exist in DB');
    }
}
