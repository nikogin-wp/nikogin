<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\Provider;
use Nikogin\Framework\Abstracts\ProviderManager as BaseProviderManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ProviderManager extends BaseProviderManager
{
    use ResolvesAppNamespace;

    public function register(): void
    {
        $instances = [];

        foreach (glob(dirname(__DIR__) . '/Providers/*.php') as $file) {
            $className = $this->appNamespace() . '\\Providers\\' . basename($file, '.php');

            if (!class_exists($className) || !is_subclass_of($className, Provider::class)) {
                continue;
            }

            $instance = new $className();
            $instances[] = ['instance' => $instance, 'priority' => $instance->priority()];
        }

        usort($instances, fn($a, $b) => $a['priority'] <=> $b['priority']);

        foreach ($instances as $item) {
            $item['instance']->register();
        }
    }
}
