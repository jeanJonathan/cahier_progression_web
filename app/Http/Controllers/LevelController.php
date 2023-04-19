<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape;

//Pour permettre au Controller d'utiliser le modele
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'hours_needed' => 'required|integer',
            'video_url' => 'nullable',
            'sport_id' => 'required|exists:sports,id'
        ]);

        Level::create($validatedData);

        return redirect()->route('levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);
        $etapes = Etape::where('level_id', $id)->orderBy('id', 'asc')->get();

        return view('levels.show', compact('level', 'etapes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'hours_needed' => 'required|integer',
            'video_url' => 'nullable',
            'sport_id' => 'required|exists:sports,id'
        ]);

        $level->update($validatedData);

        return redirect()->route('levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index');
    }
}
