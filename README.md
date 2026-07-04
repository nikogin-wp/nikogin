# Nikogin

Skeleton for the **Nikogin Framework** - a lightweight, Laravel-inspired foundation for building structured, maintainable WordPress plugins.

This repo is the starting point for a new plugin. The engine itself lives in the separate `nikoginwp/framework` package; this skeleton bootstraps it and gives you the folder structure, config, and routes to build on.

Full documentation: https://nikogin-wp.github.io/docs/

## Features

- **Service Container** - lightweight dependency injection, bind once, resolve anywhere
- **Repository Pattern** - consistent API across custom DB tables, WP post types, and taxonomies
- **Listeners** - replace `add_action()` / `add_filter()` with PHP 8 attributes (`#[AsListener(...)]`), auto-discovered on `plugins_loaded`
- **Controllers** - `ApiController` for REST endpoints, `MenuController` / `SubmenuController` for admin pages
- **Frontend tooling** - Vite + TypeScript + SCSS with a manifest-based asset loader
- **Console** - scaffold repositories, listeners, controllers, migrations, jobs, shortcodes, and providers via `php nikogin make:*`

## Requirements

- PHP 8.3+
- WordPress 6.0+
- Composer
- Node 20+ (for frontend assets)

## Getting started

Clone into your plugins directory:

```bash
cd wp-content/plugins
git clone https://github.com/nikogin-wp/nikogin my-plugin
cd my-plugin
composer install
```

Install frontend dependencies:

```bash
npm install
npm run dev    # development server with live reload
npm run build  # production build
```

### Rename the plugin

1. Rename the plugin folder
2. Update `nikogin.php` - change `Plugin Name`, `NIKOGIN_PLUGIN_FILE`
3. Update `bootstrap/constants.php` - change `NIKOGIN_SLUG`, `NIKOGIN_NAMESPACE`, `NIKOGIN_PREFIX`
4. Update `composer.json` - change `name` and the `Nikogin\` autoload key to your namespace
5. Run `composer dump-autoload`

## Project structure

```
app/         Your plugin's PHP code (controllers, listeners, repositories, etc.)
bootstrap/   Framework bootstrap and constants
config/      Configuration files
resources/   Frontend source (TS/SCSS) and views
routes/      Route definitions
nikogin      CLI entry point (php nikogin make:*)
nikogin.php  Main plugin file
```

See [Directory Structure](https://nikogin-wp.github.io/docs/guide/directory-structure.html) in the docs for details.

## Console commands

Scaffold classes with the built-in CLI:

```bash
php nikogin make:repository PostRepository
php nikogin make:listener SaveUserListener
php nikogin make:controller UserController
php nikogin make:migration create_users_table
php nikogin make:job SendWelcomeEmail
php nikogin make:shortcode PricingTable
php nikogin make:provider AppServiceProvider
```

Full list: [Available Commands](https://nikogin-wp.github.io/docs/console/commands.html)

## Documentation

- [Introduction](https://nikogin-wp.github.io/docs/guide/introduction.html)
- [Installation](https://nikogin-wp.github.io/docs/guide/installation.html)
- [Configuration](https://nikogin-wp.github.io/docs/essentials/configuration.html)
- [Service Providers](https://nikogin-wp.github.io/docs/essentials/service-providers.html)
- [Routing](https://nikogin-wp.github.io/docs/essentials/routing.html)
- [Database Repositories](https://nikogin-wp.github.io/docs/database/repository.html)
- [Listeners](https://nikogin-wp.github.io/docs/wordpress/listeners.html)
- [API Controllers](https://nikogin-wp.github.io/docs/http/api-controllers.html)
- [Frontend Assets](https://nikogin-wp.github.io/docs/frontend/assets.html)

## License

This project is licensed under the [MIT License](LICENSE) - free to use, modify, and distribute, with attribution.

> **Note:** if you plan to distribute this on WordPress.org, be aware their guidelines require a GPL-compatible license (MIT is compatible, but WordPress core itself is GPLv2+).
