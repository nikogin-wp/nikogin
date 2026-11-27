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
     * Root directories of currently-enabled modules.
     *
     * @return string[]
     */
    public function enabledModuleDirs(): array
    {
        $dirs = [];

        foreach ($this->discoverModules() as $module) {
            if (BaseModuleManager::isEnabled($module['class'])) {
                $dirs[] = $module['dir'];
            }
        }

        return array_values(array_unique($dirs));
    }

    /**
     * routes/ directories belonging to currently-enabled modules only.
     *
     * @return string[]
     */
    public function enabledRouteDirs(): array
    {
        return array_values(array_filter(
            array_map(fn(string $dir) => $dir . '/routes', $this->enabledModuleDirs()),
            'is_dir'
        ));
    }

    /**
     * @return array<array{class: string, dir: string}>
     */
    private function discoverModules(): array
    {
        return BaseModuleManager::discover(
            dirname(__DIR__) . '/Modules',
            $this->appNamespace() . '\\Modules'
        );
    }
}
