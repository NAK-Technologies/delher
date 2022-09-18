<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Patient;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::with('question', 'patient')->get()->groupBy('group');
        $json = json_encode($answers);
        return view('answers.index', compact('answers', 'json'));
    }
    public function store(Request $request)
    {
        $group = \Carbon\Carbon::parse(\Carbon\Carbon::now());
        foreach ($request->all() as $answer) {
            $new = new Answer;
            $new->answer = $answer['answer'] ?? '';
            $new->group = $group;
            $new->question_id = $answer['question_id'];
            $new->patient_id = $answer['patient_id'];
            // $ans
            $new->save();
        }
        return response('Created Successfully');
    }
}
