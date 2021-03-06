<?php

namespace App\Services;

use App\Http\Controllers\Api\ApiController;
use App\Models\ObjectItem;
use App\Repository\Contract\ObjectItemRepositoryInterface;
use App\Services\Contract\ObjectItemServiceInterface;
use Exception;

class ObjectItemService implements ObjectItemServiceInterface
{
    /** @var ObjectItemRepositoryInterface */
    protected $objectItemRepository;

    public function __construct(
        ObjectItemRepositoryInterface $objectItemRepository
    )
    {
        $this->objectItemRepository = $objectItemRepository;
    }

    /** @inheritdoc */
    public function findAll()
    {
        return $this->objectItemRepository->findAll();
    }

    /** @inheritdoc */
    public function search(array $attributes)
    {
        return $this->objectItemRepository->search($attributes);
    }

    /** @inheritdoc */
    public function findOneById($id)
    {
        return $this->objectItemRepository->findOneOrFailById($id);
    }

    /** @inheritdoc */
    public function createObjectItem()
    {
        return $this->objectItemRepository->getModel();
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

        if (!$this->objectItemRepository->delete($objectItem)) throw new Exception(trans(ApiController::HTTP_DESTROY_ERROR));

        return true;
    }

    /** @inheritdoc */
    public function setChildren($id, array $attributes)
    {
        $objectItem = $this->findOneById($id);
        $objectItem->detachAllChildren();

        if (isset($attributes['children'])) {
            foreach ($attributes['children'] as $child) {
                $objectItem = $this->attachObjectItem($objectItem->id, $child);
            }
        }

        return $objectItem;
    }

    /** @inheritdoc */
    public function attachObjectItem($parent, $child)
    {
        $parentObjectItem = $this->objectItemRepository->findOneOrFailById($parent);
        $childObjectItem = $this->objectItemRepository->findOneOrFailById($child);

        $parentObjectItem->children()->attach($childObjectItem);

        $parentObjectItem->load('children');

        return $parentObjectItem;
    }

    /** @inheritdoc */
    public function detachObjectItem($parent, $child)
    {
        $parentObjectItem = $this->objectItemRepository->findOneOrFailById($parent);
        $childObjectItem = $this->objectItemRepository->findOneOrFailById($child);

        $parentObjectItem->children()->detach($childObjectItem);

        $parentObjectItem->load('children');

        return $parentObjectItem;
    }
}
