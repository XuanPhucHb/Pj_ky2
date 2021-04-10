<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movie;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMovie = movie::all();
        return response()->json([
            'allMovie'=>$allMovie
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return movie::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'them moi thanh cong !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allMovie_by_ID = movie::find($id);
        return response()->json([
            'allMovie_by_ID'=>$allMovie_by_ID
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allMovie_by_ID = movie::find($id);
        $allMovie_by_ID->delete();
        $allMovie = movie::all();
        return response()->json([
            'status' => 'success',
            'message' => 'xoa thanh cong !'
        ]);
    }
}
