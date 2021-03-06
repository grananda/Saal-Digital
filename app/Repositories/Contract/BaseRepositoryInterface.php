<?php

namespace App\Repository\Contract;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
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
     * @return mixed
     */
    public function findOneOrFailById($id);

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes);

    /**
     * @param Model $entity
     * @param array $attributes
     * @return Model
     */
    public function update(Model $entity, array $attributes);

    /**
     * @param Model $entity
     * @return boolean
     */
    public function delete(Model $entity);

    /**
     * @return Model
     */
    public function getModel();

    /**
     * @return User
     */
    public function getUser();
}
