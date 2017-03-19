<?php

namespace Tests;

use App\Models\ObjectItem;
use Carbon\Carbon;
use DB;
use Faker\Factory as Faker;

trait ObjectItemApiTestTrait
{
    /**
     * @param array $attributes
     * @return ObjectItem
     */
    public function makeObjectItem($attributes = [])
    {
        $data = $this->fakeData($attributes);

        /** @var ObjectItem $team */
        $objectItem_id = DB::table('object_items')->insertGetId($data);

        $objectItem = ObjectItem::find($objectItem_id);

        return $objectItem;
    }

    /**
     * @param $parent_id
     * @param $child_id
     * @return bool
     */
    public function attachObject($parent_id, $child_id)
    {
        return DB::table('object_items_relations')->insert(
            [
                'parent_id'  => $parent_id,
                'child_id'   => $child_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function fakeData($attributes = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name'        => $fake->sentence(rand(2, 3)),
            'description' => $fake->paragraph,
            'type'        => $fake->randomElement(['user', 'pc', 'tablet', 'server', 'service', 'website']),
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ], $attributes);
    }
}
