<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($level_id)
    {
        $level = Level::find($level_id);
        return view('etapes.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etapes = new Etape;
        $etapes->level_id = $request->level_id;
        $etapes->lieu = $request->lieu;
        $etapes->date = $request->date;
        $etapes->meteo = $request->meteo;
        $etapes->progression = $request->progression;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $etapes->image = $filename;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $filename);
            $etapes->video = $filename;
        }

        $etapes->save();

        return redirect()->route('levels.show', $etapes->level_id)->with('success', 'Etape créée avec succès');
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
        $etapes = Etape::find($id);
        $level = Level::find($etapes->level_id);
        return view('etapes.edit', compact('etapes', 'level'));
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
        $etapes = Etape::find($id);
        $etapes->lieu = $request->lieu;
        $etapes->date = $request->date;
        $etapes->meteo = $request->meteo;
        $etapes->progression = $request->progression;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $etapes->image = $filename;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $filename);
            $etapes->video = $filename;
        }

        $etapes->save();

        return redirect()->route('levels.show', $etapes->level_id)->with('success', 'Etape modifiée avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etapes = Etape::find($id);
        $level_id = $etapes->level_id;
        $etapes->delete();

        return redirect()->route('levels.show', $level_id)->with('success', 'Etape supprimée avec succès');

    }
}
