<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Entities\Product;
use App\Models\Entities\ProductCategory;
use App\Policies\ProductCategoryPolicy;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        ProductCategory::class => ProductCategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
