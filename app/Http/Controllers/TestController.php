<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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

        $vals['question_count'] = \App\TestQuestion::where('test_id', $test_id)
            ->get()->count();

        // save progress
        $result = \App\Result::where('test_id', $test_id)
            ->where('user_id', Auth::user()->id)
            ->where('completed', false)
            ->get()->first();

        if (!isset($result)) {
            $result = new \App\Result;
            $result->test_id = $test_id;
            $result->user_id = Auth::user()->id;
            $result->save();
        }
        else if ($question_num > $vals['question_count']) {
            return Redirect::route('tests.finish', ['test_id' => $test_id]);
        }
        else if ($result->progress != $question_num - 1) {
            return Redirect::route('tests.question', ['test_id' => $test_id,
                'question_num' => $result->progress + 1]);
        }

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

        return view('tests.question_content', $vals);
    }

    public function answer($test_id, $question_num, $animal_id)
    {
        // save progress
        $result = \App\Result::where('test_id', $test_id)
            ->where('user_id', Auth::user()->id)
            ->where('completed', false)
            ->get()->first();

        if (!isset($result)) {
            return Redirect::route('tests.question', ['test_id' => $test_id,
                'question_num' => 1]);
        }
        else if ($result->progress != $question_num - 1) {
            return Redirect::route('tests.question', ['test_id' => $test_id,
                'question_num' => $result->progress + 1]);
        }
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

        // save results
        $result->progress++;

        if ($animal_id == $vals['animals'][0]->id) {
            $result->correct++;
        }

        $result->save();

        return view('tests.answer', $vals);
    }

    public function finish($test_id) {
        $vals['test'] = \App\Test::find($test_id);

        $result = \App\Result::where('test_id', $test_id)
            ->where('user_id', Auth::user()->id)
            ->where('completed', false)
            ->get()->first();

        $vals['question_count'] = \App\TestQuestion::where('test_id', $test_id)
            ->get()->count();

        // save test result as completed
        if (isset($result)) {
            $result->completed = true;
            $result->save();

            $vals['result'] = $result;

            return view('tests.finish', $vals);
        }
        else {
            return Redirect::route('tests');
        }
    }
}
