<?php

namespace Nikogin\Managers;

use Nikogin\Framework\Abstracts\CronManager as BaseCronManager;
use Nikogin\Framework\Traits\ResolvesAppNamespace;

class CronManager extends BaseCronManager
{
    use ResolvesAppNamespace;

    /**
     * Schedules every #[AsCron] Job in app/ and in enabled modules.
     */
    public function register(): void
    {
        $this->collect();

        parent::register();
    }

    /**
     * Unschedules every #[AsCron] Job (used on deactivation).
     */
    public function clear(): void
    {
        $this->collect();

        parent::clear();
    }

    private function collect(): void
    {
        $appDir = dirname(__DIR__);

        $this->discover($appDir, $this->appNamespace(), [$appDir . '/Modules']);

        foreach ((new ModuleManager())->enabledModuleDirs() as $moduleDir) {
            $this->discover($moduleDir, $this->appNamespace() . '\\Modules\\' . basename($moduleDir));
        }
    }
}
