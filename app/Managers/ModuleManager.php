<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\ModuleManager as BaseModuleManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ModuleManager extends BaseModuleManager
{
    use ResolvesAppNamespace;

    public function register(): void
    {
        $modulesDir = dirname(__DIR__) . '/Modules';

        if (!is_dir($modulesDir)) {
            return;
        }

        foreach (glob($modulesDir . '/*', GLOB_ONLYDIR) as $moduleDir) {
            $moduleName = basename($moduleDir);

            foreach (glob($moduleDir . '/*ServiceProvider.php') as $file) {
                $className = $this->appNamespace() . '\\Modules\\' . $moduleName . '\\' . basename($file, '.php');

                if (!class_exists($className)) {
                    continue;
                }

                $this->registerModule($className);
            }
        }

        parent::register();
    }
}
