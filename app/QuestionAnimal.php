<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnimal
{
    use SoftDeletes;

    protected $table = 'questions_animals';

    protected $dates = [ 'deleted_at' ];
}
