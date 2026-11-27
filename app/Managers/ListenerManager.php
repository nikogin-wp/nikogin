<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\ListenerManager as BaseListenerManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ListenerManager extends BaseListenerManager
{
    use ResolvesAppNamespace;

    /**
     * Discovers every #[AsListener] class anywhere in app/ (any depth), plus
     * the listeners of enabled modules. Disabled modules are skipped entirely.
     */
    public function register(): void
    {
        $appDir     = dirname(__DIR__);
        $modulesDir = $appDir . '/Modules';

        $this->discover($appDir, $this->appNamespace(), [$modulesDir]);

        foreach ((new ModuleManager())->enabledModuleDirs() as $moduleDir) {
            $this->discover(
                $moduleDir,
                $this->appNamespace() . '\\Modules\\' . basename($moduleDir)
            );
        }

        parent::register();
    }
}
