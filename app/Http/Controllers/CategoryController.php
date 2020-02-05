<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course;

class CategoryController extends Controller
{
    public function Category()
    {
        return response()->json(Category::get(), 200);
    }

    public function CategoryByID($id)
    {
        $Category = Category::find($id);
        if(is_null($Category)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Category, 200);
    }

    public function CategorySave(Request $request)
    {
        $Category = Category::create($request->all());

        return response()->json($Category, 201);
    }

    public function CategoryUpdate(Request $request, Category $Category)
    {
        $Category->update($request->all());
        return response()->json($Category, 200);
    }

    public function CategoryDelete(Request $request, Category $Category)
    {
        $Category->delete();
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $Courses = Course::where('category_id', $id)->get();
        return response()->json($Courses);
    }
}
