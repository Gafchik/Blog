<?php

namespace App\Models;

trait GetStaticTableName
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
