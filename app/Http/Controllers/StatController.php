<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class StatController extends Controller
{
    public function index()
    {
        $results  = \App\Result::where('user_id', Auth::user()->id)
            ->where('completed', true)
            ->join('tests', 'tests.id', 'results.test_id')
            ->get();

        $tests = \App\Test::all();

        $vals['tests'] = [];

        foreach ($tests as $t) {
            $vals['tests'][$t->id] = $t;
            $vals['tests'][$t->id]->attempts = 0;
        }

        foreach ($results as $r) {
            $vals['tests'][$r->test_id]->attempts++;
            $vals['tests'][$r->test_id]->sum += $r->correct;
        }

        foreach ($vals['tests'] as $key => $t) {
            $question_count = \App\TestQuestion::where('test_id', $t->id)
                ->get()->count();

            if ($t->attempts > 0) {
                $vals['tests'][$key]->average =
                    round(100*($t->sum/$t->attempts)/$question_count, 1);
            }

        }

        return view('stats.index', $vals);
    }
}
