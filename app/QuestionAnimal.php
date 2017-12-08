<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnimal extends Model
{
    use SoftDeletes;

    protected $table = 'questions_animals';

    protected $dates = [ 'deleted_at' ];
}
