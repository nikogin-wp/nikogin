<?php

/*
 * Framework Configuration
 *
 * This file is loaded during bootstrap via Config::set() and seeds the
 * framework's central config store before anything else runs.
 *
 * Values here are read by framework internals:
 *
 *   namespace  — REST API namespace used by Router::add() / Router::resource()
 *                e.g. GET /wp-json/ng/v1/examples
 *
 *   slug       — Plugin identifier used by Updater for storing the DB version option
 *
 *   version    — Current plugin version compared by Updater to decide if migrations should run
 *
 * Add any additional plugin-wide config keys here.
 * Retrieve them anywhere via: Config::get('key')
 */

return [
    'namespace' => NIKOGIN_NAMESPACE,
    'slug'      => NIKOGIN_SLUG,
    'version'   => NIKOGIN_VERSION,
    'prefix'    => NIKOGIN_PREFIX,
];
