<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class Test
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
