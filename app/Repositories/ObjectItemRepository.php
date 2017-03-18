<?php

namespace App\Repository;

use App\Models\ObjectItem;
use App\Repository\Contract\ObjectItemRepositoryInterface;

class ObjectItemRepository extends BaseRepository implements ObjectItemRepositoryInterface
{
    public function __construct(ObjectItem $model)
    {
        parent::__construct();

        $this->model = $model;
    }
}
