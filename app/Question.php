<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class Question
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];
}
