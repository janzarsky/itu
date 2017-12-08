<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Question
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
