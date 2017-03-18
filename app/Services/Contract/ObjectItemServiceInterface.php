<?php

namespace App\Services\Contract;

use App\Models\ObjectItem;

interface ObjectItemServiceInterface
{
    /**
     * @param $id
     * @return ObjectItem
     */
    public function findOneById($id);

    /**
     * @param array $attributes
     * @return ObjectItem
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @param array $attributes
     * @return ObjectItem
     */
    public function update($id, array $attributes);

    /**
     * @param $id
     * @return boolean
     */
    public function delete($id);
}
