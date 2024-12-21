<?php

namespace DevxPackage;

use Illuminate\Support\ServiceProvider;
use DevxPackage\Console\Commands\MakeAuthCycle;
use DevxPackage\Console\Commands\MakeBlade;
use DevxPackage\Console\Commands\MakeController;
use DevxPackage\Console\Commands\MakeCrud;
use DevxPackage\Console\Commands\MakeMigration;
use DevxPackage\Console\Commands\MakeModel;
use DevxPackage\Console\Commands\MakeRepository;
use DevxPackage\Console\Commands\MakeRequest;
use DevxPackage\Console\Commands\MakeRoutes;
use DevxPackage\Console\Commands\CloneAdminAssetRepository;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {

        $this->commands([

            MakeCrud::class,
            MakeModel::class,
            MakeBlade::class,
            MakeRoutes::class,
            MakeRequest::class,
            MakeAuthCycle::class,
            MakeMigration::class,
            MakeController::class,
            MakeRepository::class,
            CloneAdminAssetRepository::class,
        ]);
    }
}