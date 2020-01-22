<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Q;
use App\User;
use App\Question;

class QController extends Controller
{
    public function Q()
    {
        return response()->json(Q::get(), 200);
    }

    public function QByID($id)
    {
        $Q = Q::find($id);
        if(is_null($Q)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Q, 200);
    }

    public function QSave(Request $request)
    {
        $Q = Q::create($request->all());

        return response()->json($Q, 201);
    }

    public function QUpdate(Request $request, Q $Q)
    {
        $Q->update($request->all());
        return response()->json($Q, 200);
    }

    public function QDelete(Request $request, Q $Q)
    {
        $Q->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $Questions = Question::where('Q_id', $id)->get();
        return response()->json($Questions);
    }


    // public function QSave(Request $request)
    // {
    //     $title = $request->input('title');
    //     $purpose = $request->input('purpose');
    //     $data = User::id;
    //     $Q = Q::create([
    //         'title' => $title,
    //         'purpose' => $purpose,
    //         'user_id' => $data,
    //     ]);
    //     return response()->json($Q, 201);
    // }

}
