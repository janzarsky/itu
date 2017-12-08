<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Animal
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
