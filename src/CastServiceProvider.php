<?php

namespace Galee\Casts;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Galee\Casts\Commands\CastCommand;

class CastServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('casts')
            ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_casts_table')
            // ->hasCommand(CastCommand::class)
            ;
    }
}
