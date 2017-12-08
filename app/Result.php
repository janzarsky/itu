<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class Result
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
