<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Test
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
