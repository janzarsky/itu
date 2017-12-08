<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class TestQuestion
{
    use SoftDeletes;

    protected $table = 'tests_questions';

    protected $dates = [ 'deleted_at' ];
}
