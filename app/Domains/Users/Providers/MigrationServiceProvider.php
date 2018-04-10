<?php

namespace Emtudo\Domains\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait;
use Emtudo\Domains\Users\Database\Migrations;

class MigrationServiceProvider extends ServiceProvider
{
    use MigratorTrait;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->migrations([
            Migrations\CreateUsersTable::class,
            Migrations\CreatePasswordResetsTable::class,
        ]);
    }
}