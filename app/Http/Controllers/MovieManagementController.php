<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class MovieManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//     echo 'a';
        $title = 'Movies';
        $movies = Movie::paginate(8);
        $directors = Director::all();
        $genres = Genre::all();
        $writers = Writer::all();
        $current = Carbon::now()->format("Y");
        $year = $current - 10;
        $arr_year = [];
        $stars = [];
        for ($i=0; $i<= 10; $i++) {
            array_push($arr_year,$year+$i);
        }
        return view('admin.movies.index',
            [
                'movies' => $movies,
                'title' => $title,
                'directors' => $directors,
                'genres' => $genres,
                'writers' => $writers,
                'arr_year' => $arr_year,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         //
//     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
//     {
//         $new_movie = new Movie();
//         $new_movie->name = $request->name;
//         $file_name = $request->image;
//         if ($request->hasFile('image')) {
//             $validator = Validator::make($request->all(), [
//                 'name' => 'required',
//                 'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
//             ]);
//             if ($validator->fails()) {
//                 return response()->json([
//                     'messages' => $validator->errors()
//                 ]);
//             }
//             $file = $request->file('image');
//             $file_name = $file->getClientOriginalName('image');
//             $file->move(public_path('img/catalogs'), $file_name);
//
//
//         } else {
//             $validator = Validator::make($request->all(), [
//                 'name' => 'required',
//             ]);
//             if ($validator->fails()) {
//                 return response()->json([
//                     'messages' => $validator->errors()
//                 ], 422);
//             }
//         }
//         $new_movie->image = $file_name;
//         $new_movie->genre_id = $request->genre_id;
//         $new_movie->director_id = $request->director_id;
//         $new_movie->writer_id = $request->writer_id;
//         $new_movie->year = $request->year;
//         $new_movie->desc = $request->desc;
//         $new_movie->keyword = $request->keyword;
//         $new_movie->video_link = $request->video_link;
//         $new_movie->premiere = $request->premiere;
//         $new_movie->quality = $request->quality;
//         $new_movie->age_limit = $request->age_limit;
//         $new_movie->country = $request->country;
//         $new_movie->save();
//         return response()->json(['message' => 'Record has been inserted successfully!']);
//     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function show($id)
//     {
//         //
//     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function edit($id)
//     {
//         $movie = Movie::findOrFail($id);
//         if ($movie) {
//             return response()->json(['data' => $movie, 200]);
//         }
//     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function update(Request $request, $id)
//     {
//         $movie = Movie::findOrFail($id);
//         $file_name = $request->hidden_image;
//
//
//         if ($request->hasFile('image')) {
//             $validator = Validator::make($request->all(), [
//                 'name' => 'required',
//                 'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
//             ]);
//             if ($validator->fails()) {
//                 return response()->json([
//                     'messages' => $validator->errors()
//                 ]);
//             }
//             $file = $request->file('image');
//             $file_name = $file->getClientOriginalName('image');
//             $file->move(public_path('img/catalogs'), $file_name);
//
//
//         } else {
//             $validator = Validator::make($request->all(), [
//                 'name' => 'required',
//             ]);
//             if ($validator->fails()) {
//                 return response()->json([
//                     'messages' => $validator->errors()
//                 ], 422);
//             }
//         }
//
//         $movie->name = $request->name;
//         $movie->image = $file_name;
//         $movie->genre_id = $request->genre_id;
//         $movie->director_id = $request->director_id;
//         $movie->writer_id = $request->writer_id;
//         $movie->year = $request->year;
//         $movie->desc = $request->desc;
//         $movie->keyword = $request->keyword;
//         $movie->video_link = $request->video_link;
//         $movie->premiere = $request->premiere;
//         $movie->quality = $request->quality;
//         $movie->age_limit = $request->age_limit;
//         $movie->country = $request->country;
//         $movie->updated_at = Date::now();
//         $movie->update();
//         return response()->json(['message' => 'Record has been updated successfully!']);
//     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function destroy($id)
//     {
//         $movie = Movie::findOrFail($id);
//         if ($movie) {
//             $movie->delete();
//             return response()->json([
//                 'message' => 'Record has been deleted successfully!',
//             ], 200);
//         }
//     }
}
