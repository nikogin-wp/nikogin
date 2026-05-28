<?php

namespace Nikogin\Providers;

use Nikogin\Controllers\Dashboards\Menu\ExampleMenuController;
use Nikogin\Controllers\Dashboards\Submenu\ExampleSubmenuController;
use Nikogin\Framework\Abstracts\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function priority(): int
    {
        return 20;
    }

    protected array $services = [
        ExampleMenuController::class,
        ExampleSubmenuController::class,
    ];
}
