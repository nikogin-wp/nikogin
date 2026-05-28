<?php

namespace Nikogin\Controllers\Dashboards\Menu;

use Nikogin\Framework\Abstracts\MenuController;

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
        echo '<div class="wrap"><h1>' . esc_html($this->pageTitle) . '</h1></div>';
    }
}
