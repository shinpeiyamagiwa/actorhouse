<?php

namespace App\Http\Controllers;

use App\Actor;
use App\FavoriteMovie;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            return view('admin.actors.create');
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
    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     Actor::create($request->all());
    //     // Actor::create([
    //     //     'name' => 'kkkk',
    //     //     'youtube_link' => $request->aaaa
    //     //     'image_path' => 
    //     // ]);
    //     return redirect('/admin/actors');
    // }
    public function store(Request $request)
    {
        
        Actor::create($request->all());
        return redirect('/admin/actors');
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
        $actor = Actor::where('actors.tmdb_id', '=', $id)
                    ->first();
        
        return view('admin.actors.edit', compact('actor'));
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
        //
        $actor = Actor::findOrFail($id);
        
        Actor::where('actors.tmdb_id', '=', $id)
        ->update([
            'name' => $request->name,
            'place' => $request->place,
            'birthday' => $request->birthday,
            'image_path' => $request->image_path,
            'homepage' => $request->homepage,
            'info' => $request->info,
            'video_link' => $request->video_link,
            'twitter_link' => $request->twitter_link,
            ]);
        return redirect("/actor/$id");;
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
