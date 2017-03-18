<?php

namespace App\Services;

use App\Http\Controllers\Api\ApiController;
use App\Models\ObjectItem;
use App\Repository\Contract\ObjectItemRepositoryInterface;
use App\Services\Contract\ObjectItemServiceInterface;
use Exception;

class ObjectItemService implements ObjectItemServiceInterface
{
    protected $objectItemRepository;

    public function __construct(ObjectItemRepositoryInterface $objectItemRepository)
    {
        $this->objectItemRepository = $objectItemRepository;
    }

    /** @inheritdoc */
    public function search($param)
    {
        return $this->objectItemRepository->search($param);
    }

    /** @inheritdoc */
    public function findOneById($id)
    {
        return $this->objectItemRepository->findOneOrFailById($id);
    }

    /** @inheritdoc */
    public function create(array $attributes)
    {
        return $this->objectItemRepository->create($attributes);
    }

    /** @inheritdoc */
    public function update($id, array $attributes)
    {
        /** @var  ObjectItem $organization */
        $objectItem = $this->objectItemRepository->findOneOrFailById($id);

        return $this->objectItemRepository->update($objectItem, $attributes);
    }

    /** @inheritdoc */
    public function delete($id)
    {
        $objectItem = $this->objectItemRepository->findOneOrFailById($id);

        if (!$this->$objectItem->delete($objectItem)) throw new Exception(trans(ApiController::HTTP_DESTROY_ERROR));

        return true;
    }
}
