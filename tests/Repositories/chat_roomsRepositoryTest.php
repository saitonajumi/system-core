<?php namespace Tests\Repositories;

use App\Models\chat_rooms;
use App\Repositories\chat_roomsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_roomsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_roomsRepository
     */
    protected $chatRoomsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatRoomsRepo = \App::make(chat_roomsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->make()->toArray();

        $createdchat_rooms = $this->chatRoomsRepo->create($chatRooms);

        $createdchat_rooms = $createdchat_rooms->toArray();
        $this->assertArrayHasKey('id', $createdchat_rooms);
        $this->assertNotNull($createdchat_rooms['id'], 'Created chat_rooms must have id specified');
        $this->assertNotNull(chat_rooms::find($createdchat_rooms['id']), 'chat_rooms with given id must be in DB');
        $this->assertModelData($chatRooms, $createdchat_rooms);
    }

    /**
     * @test read
     */
    public function test_read_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();

        $dbchat_rooms = $this->chatRoomsRepo->find($chatRooms->id);

        $dbchat_rooms = $dbchat_rooms->toArray();
        $this->assertModelData($chatRooms->toArray(), $dbchat_rooms);
    }

    /**
     * @test update
     */
    public function test_update_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();
        $fakechat_rooms = chat_rooms::factory()->make()->toArray();

        $updatedchat_rooms = $this->chatRoomsRepo->update($fakechat_rooms, $chatRooms->id);

        $this->assertModelData($fakechat_rooms, $updatedchat_rooms->toArray());
        $dbchat_rooms = $this->chatRoomsRepo->find($chatRooms->id);
        $this->assertModelData($fakechat_rooms, $dbchat_rooms->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_rooms()
    {
        $chatRooms = chat_rooms::factory()->create();

        $resp = $this->chatRoomsRepo->delete($chatRooms->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_rooms::find($chatRooms->id), 'chat_rooms should not exist in DB');
    }
}
