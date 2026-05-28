<?php

namespace Nikogin\Providers;

use Nikogin\Controllers\Api\ExampleController;
use Nikogin\Framework\Abstracts\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function priority(): int
    {
        return 10;
    }

    protected array $services = [
        ExampleController::class,
    ];
}
