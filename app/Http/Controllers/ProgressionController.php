<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressions = Progression::all();
        return view('progressions.index', compact('progressions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('progressions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $progression = Progression::create([
            'kite_id' => $request->kite_id,
            'level_id' => $request->level_id,
            'date' => $request->date,
            'location' => $request->location,
            'weather' => $request->weather,
            'notes' => $request->notes,
            'photo_url' => $request->photo_url,
            'video_url' => $request->video_url,
            'user_id' => auth()->user()->id,
            'etape_id' => $request->etape_id,
            'surf_progression' => $request->surf_progression,
            'kite_progression' => $request->kite_progression,
            'wingfoil_progression' => $request->wingfoil_progression
        ]);

        return redirect()->route('progressions.show', $progression->id)->with('success', 'Progression créée avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progression = Progression::find($id);
        return view('progressions.show', compact('progression'));
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
        //
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
