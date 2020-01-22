<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;

class AnswerController extends Controller
{
    public function Answer()
    {
        return response()->json(Answer::get(), 200);
    }

    public function AnswerByID($id)
    {
        $Answer = Answer::find($id);
        if(is_null($Answer)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Answer, 200);
    }

    public function AnswerSave(Request $request)
    {
        $Answer = Answer::create($request->all());

        return response()->json($Answer, 201);
    }

    public function AnswerUpdate(Request $request, Answer $Answer)
    {
        $Answer->update($request->all());
        return response()->json($Answer, 200);
    }

    public function AnswerDelete(Request $request, Answer $Answer)
    {
        $Answer->delete();
        return response()->json(null, 204);
    }
}
