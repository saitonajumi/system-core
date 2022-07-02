<?php

namespace App\Providers;

use Nuwave\Lighthouse\Schema\TypeRegistry;
use MLL\GraphQLScalars\MixedScalar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $typeRegistry = app(TypeRegistry::class);
        $typeRegistry->register(new MixedScalar());
    }
}
