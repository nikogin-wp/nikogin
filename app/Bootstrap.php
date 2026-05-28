<?php

namespace App;

class Bootstrap {

    public static function init(): void
    {
        $config = require NIKOGIN_CONFIG_DIR . 'app.php';

        foreach ($config['bootstraps'] as $bootClass) {
            $bootClass::boot();
        }
    }
}