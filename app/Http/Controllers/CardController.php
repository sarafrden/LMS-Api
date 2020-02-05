<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;
use App\Course;

class CardController extends Controller
{
    public function Card()
    {
        return response()->json(Card::get(), 200);
    }

    public function CardByID($id)
    {
        $Card = Card::find($id);
        if(is_null($Card)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Card, 200);
    }

    public function CardSave(Request $request)
    {
        $Card = Card::create($request->all());

        return response()->json($Card, 201);
    }

    public function CardUpdate(Request $request, Card $Card)
    {
        $Card->update($request->all());
        return response()->json($Card, 200);
    }

    public function CardDelete(Request $request, Card $Card)
    {
        $Card->delete();
        return response()->json(null, 204);
    }
    // public function show($id)
    // {
    //     $Answers = Answer::where('Card_id', $id)->get();
    //     return response()->json($Answers);
    // }
}
