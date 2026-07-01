<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\ModuleManager as BaseModuleManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class ModuleManager extends BaseModuleManager
{
    use ResolvesAppNamespace;

    public function register(): void
    {
        foreach ($this->discoverModules() as $module) {
            $this->registerModule($module['class']);
        }

        parent::register();
    }

    /**
     * routes/ directories belonging to currently-enabled modules only.
     *
     * @return string[]
     */
    public function enabledRouteDirs(): array
    {
        $dirs = [];

        foreach ($this->discoverModules() as $module) {
            if (!BaseModuleManager::isEnabled($module['class'])) {
                continue;
            }

            $routesDir = $module['dir'] . '/routes';

            if (is_dir($routesDir)) {
                $dirs[] = $routesDir;
            }
        }

        return $dirs;
    }

    /**
     * @return array<array{class: string, dir: string}>
     */
    private function discoverModules(): array
    {
        $modulesDir = dirname(__DIR__) . '/Modules';

        if (!is_dir($modulesDir)) {
            return [];
        }

        $modules = [];

        foreach (glob($modulesDir . '/*', GLOB_ONLYDIR) as $moduleDir) {
            $moduleName = basename($moduleDir);

            foreach (glob($moduleDir . '/Providers/*ServiceProvider.php') as $file) {
                $className = $this->appNamespace() . '\\Modules\\' . $moduleName . '\\Providers\\' . basename($file, '.php');

                if (!class_exists($className)) {
                    continue;
                }

                $modules[] = ['class' => $className, 'dir' => $moduleDir];
            }
        }

        return $modules;
    }
}
