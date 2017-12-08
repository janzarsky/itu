<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Result
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
