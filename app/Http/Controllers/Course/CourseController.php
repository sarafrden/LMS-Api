<?php

namespace App\Http\Controllers\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Stripe\Product;
use Stripe\Plan;
use App\video;

\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

class CourseController extends Controller
{

    public function Course()
    {
        $cours = Course::get();
        return response()->json($cours, 200);
    }

    public function CourseByID($id)
    {
        $Course = Course::find($id);
        if(is_null($Course)){
            return response()->json('Record is not found', 404);

        }
        return response()->json($Course, 200);
    }

    public function CourseSave(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $type = $request->input('type');
        $price = $request->input('price');
        $Course = Course::create([
            'title' => $title,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'price' => $price,
            'product_id' => 'sara_2222244',
            'plan_id' => 'plan_2222244'
        ]);
        $plan = Plan::create([
            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'month',
            'id' => 'plan_2222244',
            'product' => [
                'name' => $title,
                'type' => 'service',
                'id' => 'sara_2222244'
            ],
        ]);
        return response()->json($plan, 201);
    }

    public function CourseUpdate(Request $request, $Course)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $rating = $request->input('rating');
        $category = $request->input('category');
        $type = $request->input('type');
        $price = $request->input('price');
        $update = Course::where('id', $Course)->update([
            'title' => $title,
            'description' => $description,
            'rating' => $rating,
            'category' => $category,
            'price' => $price
        ]);
        $get_data = Course::where('id', $Course)->first();
        $product = Product::update($get_data->product_id,
            ['name' => $title]
        );

        // $delete = Plan::retrieve($get_data->plan_id)->delete();

        // $plan = Plan::create([
        //     'amount' => $price,
        //     'currency' => 'usd',
        //     'interval' => 'month',
        //     'id' => 'plan_22222',
        //     'product' => [
        //         'name' => $title,
        //         'type' => 'service',
        //         'id' => $get_data->plan_id
        //     ],
        // ]);

        return response()->json($update, 200);
    }

    public function CourseDelete(Request $request, Course $Course)
    {
        $Course->delete();
        return response()->json(null, 204);
    }
    public function test()
    {
        $s = Product::all();
        return response()->json($s);
    }



    public function episode(Series $series, $episodeNumber)
    {
        $video= $series->videos()->where('episode_number', $episodeNumber)->first();
        $nextVideo= $series->videos()->where('episode_number', $episodeNumber+1)->first();
        $nextVideoUrl = $nextVideo->url ?? null;
        $breadCrumbs = [
            [
                'text'=> 'Browse',
                'href'=> route('series.index', $series)
            ],
            [
                'text'=> $series->title,
                'href'=> route('series.show', $series)
            ],
            [
                'text'=> $video->title,
                'active'=> true
            ],
        ];
    }


    public function show($id)
    {
        $videos = video::where('courses_id', $id)->get();
        return response()->json($videos);
    }




}
