<?php

namespace Nikogin\Controllers\Api;

use Nikogin\Framework\Abstracts\ApiController;
use WP_REST_Response;

class ExampleController extends ApiController
{
    public function index(): WP_REST_Response
    {
        return $this->success(['key' => 'value']);
    }
}
