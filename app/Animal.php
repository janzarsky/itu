<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class Animal
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
