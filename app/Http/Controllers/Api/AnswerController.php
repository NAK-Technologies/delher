<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Patient;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $group = \Carbon\Carbon::parse(\Carbon\Carbon::now());
        foreach ($request->all() as $answer) {
            $answer['answer'] = $answer['answer'] ?? '';
            $answer['group'] = $group;
            // $ans
            Answer::create($answer);
        }
        return response('Created Successfully');
    }
}
