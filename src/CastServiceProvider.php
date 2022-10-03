<?php

namespace Galee\Casts;

use Galee\Casts\Commands\CastCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CastServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('casts')
            ->hasConfigFile();
    }
}
