<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function Video()
    {
        return response()->json(Video::get(), 200);
    }

    public function VideoByID($id)
    {
        $Video = Video::find($id);
        if(is_null($Video)){
            return response()->json('Record is not found', 404);
    
        }
        return response()->json($Video, 200);
    }

    public function VideoSave(Request $request)
    {
        $Video = Video::create($request->all());
        
        return response()->json($Video, 201);
    }

    public function VideoUpdate(Request $request, Video $Video)
    {
        $Video->update($request->all());
        return response()->json($Video, 200);
    }

    public function VideoDelete(Request $request, Video $Video)
    {
        $Video->delete();
        return response()->json(null, 204);
    }
    public function VideoList()
    {
        return response()->download(public_path('sara.png'), 'data');
    }

    //public function VideoSave(Request $request){
      //  $fileName = "user_image.png";
        //$path = $request->file('photo')->move(public_path("/"), $fileName);
        //$photoURL = url('/'.$fileName);
        //return response()->json(['url' => $photoURL], 200);
    //}



    public function upload(Request $request)
    {
        $file = $request->file('file');
        
        $path = $file->store('videos');
        return response()->json($path);
    }
}
