<?php

namespace App\Providers;

use App\Services\Common\impl\SystemFileServiceImpl;
use App\Services\Common\SystemFileService;
use App\Services\System\AuthService;
use App\Services\System\Impl\AuthServiceImpl;
use App\Services\System\Impl\ProductCategoryServiceImpl;
use App\Services\System\Impl\ProductServiceImpl;
use App\Services\System\ProductCategoryService;
use App\Services\System\ProductService;
use Carbon\Laravel\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl();
        });

        $this->app->bind(ProductCategoryService::class, function ($app) {
            return new ProductCategoryServiceImpl();
        });

        $this->app->bind(ProductService::class, function ($app) {
            return new ProductServiceImpl(new SystemFileServiceImpl());
        });

        $this->app->bind(SystemFileService::class, function ($app) {
            return new SystemFileServiceImpl();
        });
    }
}
