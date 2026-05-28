<?php

use Nikogin\Controllers\Api\ArticleController;
use Nikogin\Controllers\Api\ExampleController;
use Nikogin\Framework\Support\Container;
use Nikogin\Framework\Support\Router;
use WP_REST_Server;

Router::add('/examples', [
    'methods'             => WP_REST_Server::READABLE,
    'callback'            => [Container::get(ExampleController::class), 'index'],
    'permission_callback' => '__return_true',
]);

Router::add('/articles', [
    'methods'             => WP_REST_Server::READABLE,
    'callback'            => [Container::get(ArticleController::class), 'index'],
    'permission_callback' => '__return_true',
]);

Router::add('/articles', [
    'methods'             => WP_REST_Server::CREATABLE,
    'callback'            => [Container::get(ArticleController::class), 'store'],
    'permission_callback' => '__return_true',
]);
