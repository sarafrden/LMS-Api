<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Q;
use App\Question;
use App\Answer;
use App\User;

class UserController extends Controller
{
    public function User()
    {
        return response()->json(User::get(), 200);
    }

    public function UserByID($id)
    {
        $User = User::find($id);
        if(is_null($User)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($User, 200);
    }

    public function UserSave(Request $request)
    {
        $User = User::create($request->all());

        return response()->json($User, 201);
    }

    public function UserUpdate(Request $request, User $User)
    {
        $User->update($request->all());
        return response()->json($User, 200);
    }

    public function UserDelete(Request $request, User $User)
    {
        $User->delete();
        return response()->json(null, 204);
    }
}
