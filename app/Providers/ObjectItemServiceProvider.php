<?php

namespace App\Providers;

use App\Repository\Contract\ObjectItemRepositoryInterface;
use App\Repository\ObjectItemRepository;
use App\Services\Contract\ObjectItemServiceInterface;
use App\Services\ObjectItemService;
use Illuminate\Support\ServiceProvider;

class ObjectItemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ObjectItemServiceInterface::class, ObjectItemService::class);
        $this->app->bind(ObjectItemRepositoryInterface::class, ObjectItemRepository::class);
    }
}
