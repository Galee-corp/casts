<?php

namespace Galee\Casts\Commands;

use Illuminate\Console\Command;

class CastCommand extends Command
{
    public $signature = 'casts';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
