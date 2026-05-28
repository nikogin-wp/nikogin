<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\Listener;
use Nikogin\Framework\Abstracts\ListenerManager as BaseListenerManager;

class ListenerManager extends BaseListenerManager
{
    public function register(): void
    {
        foreach (glob(dirname(__DIR__) . '/Listeners/*.php') as $file) {
            $className = 'Nikogin\\Listeners\\' . basename($file, '.php');

            if (!class_exists($className) || !is_subclass_of($className, Listener::class)) {
                continue;
            }

            $this->registerListener($className);
        }

        parent::register();
    }
}
