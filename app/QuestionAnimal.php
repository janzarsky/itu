<?php

namespace App;

use Illuminate\Database\SoftDeletes;

class QuestionAnimal
{
    use SoftDeletes;

    protected $table = 'questions_animals';

    protected $dates = [ 'deleted_at' ];
}
