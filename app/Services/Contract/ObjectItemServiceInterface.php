<?php

namespace App\Services\Contract;

use App\Models\ObjectItem;
use Illuminate\Database\Eloquent\Collection;

interface ObjectItemServiceInterface
{
    /**
     * @return Collection
     */
    public function findAll();

    /**
     * @param array $attributes
     * @return Collection
     */
    public function search(array $attributes);

    /**
     * @param $id
     * @return ObjectItem
     */
    public function findOneById($id);

    /**
     * @return ObjectItem
     */
    public function createObjectItem();

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

    /**
     * @param $id
     * @param array $attributes
     * @return ObjectItem
     */
    public function setChildren($id, array $attributes);

    /**
     * @param $parent
     * @param $child
     * @return ObjectItem
     */
    public function attachObjectItem($parent, $child);

    /**
     * @param $parent
     * @param $child
     * @return ObjectItem
     */
    public function detachObjectItem($parent, $child);
}
