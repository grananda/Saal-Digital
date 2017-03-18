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
     * @param string $param
     * @return Collection
     */
    public function search($param);

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
