<?php

namespace Nikogin\Controllers\Dashboards\Menu;

use Nikogin\Framework\Abstracts\MenuController;
use Nikogin\Framework\Support\View;

class ExampleMenuController extends MenuController
{
    protected string $menuSlug   = 'nikogin';
    protected string $pageTitle  = 'Nikogin';
    protected string $menuTitle  = 'Nikogin';
    protected string $capability = 'manage_options';
    protected string $view       = 'example';
    protected string $dashIcon   = 'dashicons-admin-generic';

    public function processForm(): void
    {
        //
    }

    public function view(): void
    {
        View::load('example.example', ['pageTitle' => $this->pageTitle]);
    }
}
