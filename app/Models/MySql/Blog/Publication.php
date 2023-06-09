<?php

namespace App\Models\MySql\Blog;

use App\Models\BaseModel;

class Publication extends BaseModel
{
    protected $connection = 'blog_db';
    protected $table = 'publication';
}
