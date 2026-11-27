<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\ProviderManager as BaseProviderManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ProviderManager extends BaseProviderManager
{
    use ResolvesAppNamespace;

    /**
     * Registers every provider in app/Providers (sorted by priority()), then
     * lets the base class store the plugin version so migrations run once.
     */
    public function register(): void
    {
        $this->discover(dirname(__DIR__) . '/Providers', $this->appNamespace() . '\\Providers');

        parent::register();
    }
}
