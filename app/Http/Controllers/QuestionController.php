<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Q;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    public function Question()
    {
        return response()->json(Question::get(), 200);
    }

    public function QuestionByID($id)
    {
        $Question = Question::find($id);
        if(is_null($Question)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Question, 200);
    }

    public function QuestionSave(Request $request)
    {
        $Question = Question::create($request->all());

        return response()->json($Question, 201);
    }

    public function QuestionUpdate(Request $request, Question $Question)
    {
        $Question->update($request->all());
        return response()->json($Question, 200);
    }

    public function QuestionDelete(Request $request, Question $Question)
    {
        $Question->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $Answers = Answer::where('question_id', $id)->get();
        return response()->json($Answers);
    }
}
