<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestQuestion extends Model
{
    use SoftDeletes;

    protected $table = 'tests_questions';

    protected $dates = [ 'deleted_at' ];
}
