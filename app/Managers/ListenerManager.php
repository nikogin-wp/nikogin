<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\Listener;
use Nikogin\Framework\Abstracts\ListenerManager as BaseListenerManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ListenerManager extends BaseListenerManager
{
    use ResolvesAppNamespace;

    public function register(): void
    {
        foreach (glob(dirname(__DIR__) . '/Listeners/*.php') as $file) {
            $className = $this->appNamespace() . '\\Listeners\\' . basename($file, '.php');

            if (!class_exists($className) || !is_subclass_of($className, Listener::class)) {
                continue;
            }

            $this->registerListener($className);
        }

        parent::register();
    }
}
