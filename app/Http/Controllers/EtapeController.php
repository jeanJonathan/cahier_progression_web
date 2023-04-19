<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape;
use App\Models\Level;

class EtapeController extends Controller
{
    public function index()
    {
        $etapes = Etape::all();
        return view('etape.index', compact('etapes'));
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
        $etapes->video_url = $request->video_url;
        $etapes->progression_id = $request->progression_id;

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
