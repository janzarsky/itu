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

    public function question(Request $request, $test_id, $question_num)
    {
        if ($request->input('answer', 0) !== 0)
            return $this->answer($test_id, $question_num, $request->input('answer'));

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

        $vals['question_count'] = \App\TestQuestion::where('test_id', $test_id)
            ->get()->count();

        switch ($vals['question']->type) {
        case 'choose_name_from_description':
            return view('tests.choose_name_from_description', $vals);
        default:
            return 'unknown question type';
        }
    }

    public function answer($test_id, $question_num, $animal_id)
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

        $vals['animal_id'] = $animal_id;

        $vals['question_count'] = \App\TestQuestion::where('test_id', $test_id)
            ->get()->count();

        $vals['next'] = \App\TestQuestion::where('test_id', $test_id)
            ->where('position', $question_num + 1)
            ->get()->first();

        if (!isset($vals['next'])) {
            $vals['finish'] = true;
        }

        switch ($vals['question']->type) {
        case 'choose_name_from_description':
            return view('tests.choose_name_from_description_answer', $vals);
        default:
            return 'unknown question type';
        }
    }

    public function finish($test_id) {
        $vals['test'] = \App\Test::find($test_id);

        return view('tests.finish', $vals);
    }
}
