<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Requests\CreateMovieRequest;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('admin.movies.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Movie::create($request->all());
        return redirect('/admin/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $movie = Movie::where('movies.tmdb_id', '=', $id)
                    ->first();
                    
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMovieRequest $request, $id)
    {
        //
        $validated = $request->validated();
        
        Movie::where('movies.tmdb_id', '=', $id)
        ->update([
            'title' => $request->title,
            'image_path' => $request->image_path,
            'overview' => $request->overview,
            'video_link' => $request->video_link,
            'screen_time' => $request->screen_time,
            'released_at' => $request->released_at,
            ]);
        return redirect("/movie/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
