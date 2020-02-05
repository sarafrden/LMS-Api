<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use App\Course;

class TeacherController extends Controller
{
    public function Teacher()
    {
        return response()->json(Teacher::get(), 200);
    }

    public function TeacherByID($id)
    {
        $Teacher = Teacher::find($id);
        if(is_null($Teacher)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Teacher, 200);
    }

    public function TeacherSave(Request $request)
    {
        $Teacher = Teacher::create($request->all());

        return response()->json($Teacher, 201);
    }

    public function TeacherUpdate(Request $request, Teacher $Teacher)
    {
        $Teacher->update($request->all());
        return response()->json($Teacher, 200);
    }

    public function TeacherDelete(Request $request, Teacher $Teacher)
    {
        $Teacher->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $Courses = Course::where('teacher_id', $id)->get();
        return response()->json($Courses);
    }


}
