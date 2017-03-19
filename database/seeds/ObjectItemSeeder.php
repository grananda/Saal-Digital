<?php

use Illuminate\Database\Seeder;
use Tests\Api\ObjectItemApiTestTrait;

class ObjectItemSeeder extends Seeder
{
    use ObjectItemApiTestTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj_user_1 = $this->makeObjectItem(['name' => 'User 1', 'type' => 'user']);
        $obj_user_2 = $this->makeObjectItem(['name' => 'User 2', 'type' => 'user']);
        $obj_pc = $this->makeObjectItem(['name' => 'PC', 'type' => 'device']);
        $obj_tablet = $this->makeObjectItem(['name' => 'Tablet', 'type' => 'device']);
        $obj_pc_2 = $this->makeObjectItem(['name' => 'PC 2', 'type' => 'device']);
        $obj_server_1 = $this->makeObjectItem(['name' => 'Server 1', 'type' => 'server']);
        $obj_server_2 = $this->makeObjectItem(['name' => 'Server 2', 'type' => 'server']);
        $obj_service_1 = $this->makeObjectItem(['name' => 'Service 1', 'type' => 'service']);
        $obj_website = $this->makeObjectItem(['name' => 'Website', 'type' => 'service']);

        $this->attachObject($obj_user_1->id, $obj_pc->id);
        $this->attachObject($obj_user_2->id, $obj_pc_2->id);

        $this->attachObject($obj_pc->id, $obj_server_1->id);
        $this->attachObject($obj_pc->id, $obj_server_2->id);

        $this->attachObject($obj_tablet->id, $obj_server_1->id);
        $this->attachObject($obj_tablet->id, $obj_server_2->id);

        $this->attachObject($obj_pc_2->id, $obj_server_1->id);
        $this->attachObject($obj_pc_2->id, $obj_server_2->id);

        $this->attachObject($obj_server_1->id, $obj_service_1->id);
        $this->attachObject($obj_server_2->id, $obj_website->id);
    }
}
