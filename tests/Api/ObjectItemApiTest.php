<?php

namespace Tests\Api;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObjectItemApiTest extends ApiTestCase
{
    use DatabaseTransactions, WithoutMiddleware;
    use ObjectItemApiTestTrait;

    /**
     * @test
     */
    public function get_objectItems()
    {
        $objectItem = $this->makeObjectItem();

        $this->get('/objects')
            ->assertStatus(HttpResponse::HTTP_OK)
            ->assertJsonFragment(['name' => $objectItem->name]);
    }

    /**
     * @test
     */
    public function get_objectItem()
    {
        $objectItem = $this->makeObjectItem();

        $this->get('/objects/' . $objectItem->id)
            ->assertStatus(HttpResponse::HTTP_OK)
            ->assertJsonFragment(['name' => $objectItem->name]);
    }

    /**
     * @test
     */
    public function insert_objectItems()
    {
        $objectItem = $this->fakeData();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('/objects', $objectItem)
            ->assertStatus(HttpResponse::HTTP_CREATED)
            ->assertJsonFragment(['name' => $objectItem['name']]);
    }

    /**
     * @test
     */
    public function update_objectItems()
    {
        $objectItem = $this->makeObjectItem();
        $objectItemData = $this->fakeData();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->patch('/objects/' . $objectItem->id, $objectItemData)
            ->assertStatus(HttpResponse::HTTP_OK)
            ->assertJsonFragment(['name' => $objectItemData['name']]);
    }

    /**
     * @test
     */
    public function delete_objectItem()
    {
        $objectItem = $this->makeObjectItem();

        $this->delete('/objects/' . $objectItem->id)
            ->assertStatus(HttpResponse::HTTP_OK);

        $this->assertDatabaseMissing('object_items', ['name' => $objectItem->name]);
    }

    /**
     * @test
     */
    public function attach_objectItem()
    {
        $objectItem_1 = $this->makeObjectItem();
        $objectItem_2 = $this->makeObjectItem();

        $this->patch('/objects/' . $objectItem_1->id . '/attach/' . $objectItem_2->id)
            ->assertStatus(HttpResponse::HTTP_OK)
            ->assertJsonFragment(['name' => $objectItem_2->name]);
    }

    /**
     * @test
     */
    public function detach_objectItem()
    {
        $objectItem_1 = $this->makeObjectItem();
        $objectItem_2 = $this->makeObjectItem();

        $this->attachObject($objectItem_1->id, $objectItem_2->id);

        $this->patch('/objects/' . $objectItem_1->id . '/detach/' . $objectItem_2->id)
            ->assertStatus(HttpResponse::HTTP_OK)
            ->assertJsonFragment(['children' => []]);
    }
}
