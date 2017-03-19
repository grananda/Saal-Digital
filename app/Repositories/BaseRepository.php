<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Contract\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var User
     */
    protected $user;

    public function __construct()
    {
        $this->user = Auth::check() ? Auth::user() : Auth::guard('api')->user();
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->getModel()
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function search(array $attributes)
    {
        return $this->getModel()
            ->where('name', 'like', '%' . $attributes['param'] . '%')
            ->orWhere('description', 'like', '%' . $attributes['param'] . '%')
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function findOneOrFailById($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->with(['children'])
            ->firstOrFail();
    }

    /**
     * @inheritdoc
     */
    public function create(array $attributes)
    {
        return $this->getModel()->create($attributes);
    }

    /**
     * @inheritdoc
     */
    public function update(Model $entity, array $attributes)
    {
        $entity->fill($attributes);
        $entity->save();

        return $entity;
    }

    /**
     * @inheritdoc
     */
    public function delete(Model $entity)
    {
        $entity->delete();

        return $entity;
    }

    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function getUser()
    {
        return Auth::check() ? Auth::user() : Auth::guard('api')->user();
    }
}
