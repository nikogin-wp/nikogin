<?php

namespace Nikogin\Controllers\Dashboards\Submenu;

use Nikogin\Framework\Abstracts\SubmenuController;

class ExampleSubmenuController extends SubmenuController
{
    protected string $parentSlug = 'nikogin';
    protected string $menuSlug   = 'nikogin-example';
    protected string $pageTitle  = 'Example';
    protected string $menuTitle  = 'Example';
    protected string $capability = 'manage_options';
    protected string $view       = 'example-sub';

    public function processForm(): void
    {
        //
    }

    public function view(): void
    {
        echo '<div class="wrap"><h1>' . esc_html($this->pageTitle) . '</h1></div>';
    }
}
