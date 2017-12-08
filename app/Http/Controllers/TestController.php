<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{
    public function index()
    {
        $vals['tests']  = \App\Test::all();

        return view('tests.index', $vals);
    }

    public function take($test_id)
    {
        return Redirect::route("tests.question", ['id' => $test_id,
            'question_num' => 1]);
    }

    public function question($test_id, $question_num, $animal_id = -1)
    {
        $vals['test'] = \App\Test::find($test_id);

        $vals['question'] = \App\TestQuestion::where('test_id', $test_id)
            ->where('position', $question_num)
            ->join('questions', 'questions.id', 'tests_questions.question_id')
            ->get()->first();

        $vals['animals'] = \App\QuestionAnimal::where('question_id',
            $vals['question']->id)
            ->join('animals', 'animals.id', 'questions_animals.animal_id')
            ->orderBy('position')
            ->get();

        if ($animal_id !== -1) {
            $vals['next'] = \App\TestQuestion::where('test_id', $test_id)
                ->where('position', $question_num + 1)
                ->get()->first();

            if (!isset($vals['next'])) {
                $vals['finish'] = true;
            }
        }

        $vals['animal_id'] = $animal_id;

        switch ($vals['question']->type) {
        case 'choose_name_from_description':
            return view('tests.choose_name_from_description', $vals);
        default:
            return 'unknown question type';
        }
    }

    public function finish($test_id) {
        $vals['test'] = \App\Test::find($test_id);

        return view('tests.finish', $vals);
    }
}
