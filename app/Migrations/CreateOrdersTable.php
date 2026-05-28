<?php

namespace Nikogin\Migrations;

use Nikogin\Framework\Abstracts\Migration;

class CreateOrdersTable extends Migration
{
    public function getTableName(): string
    {
        return 'orders';
    }

    public function getSchema(): string
    {
        $table = $this->getFullTableName();

        return "CREATE TABLE {$table} (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$this->charsetCollate};";
    }
}
