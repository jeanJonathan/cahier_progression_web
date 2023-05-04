<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape;
//On va utiliser la table level a cause du sport qui sera interessant pour les methode index des differents sport
use App\Models\Level;
use App\Models\Sport;

class EtapeController extends Controller
{
    public function index()
    {
        $etapes = Etape::all();
        return view('etape.index', compact('etapes'));
        //return view('etapes', ['etapes' => $etapes]);
    }
    public function indexWingfoil()
    {
        // on initialise sport pour identifier le wingfoil
        $sport = '1';
        // On récupére les etapes(normalement level) pour ce sport
        $etapes = Etape::join('levels', 'etapes.level_id', '=', 'levels.id')
            ->where('levels.sport_id', $sport)
            ->get();
        //On definie la variable level pour reccuperer les level afin de manipuler le nom du sport via la cle etrangere
        $sportNom = Sport::where('name', 'Wing foil')->firstOrFail();
        // On retourne les données dans la vue index
        return view('etape.index', compact('etapes', 'sportNom'));
    }
    public function indexKiteSurf()
    {
        $sport = '2';
        $etapes = Etape::join('levels', 'etapes.level_id', '=', 'levels.id')
            ->where('levels.sport_id', $sport)
            ->get();
        $sportNom = Sport::where('name', 'Kite Surf')->firstOrFail();
        return view('etape.index', compact('etapes', 'sportNom'));
    }

    public function indexSurf()
    {
        $sport = '3';
        $etapes = Etape::join('levels', 'etapes.level_id', '=', 'levels.id')
            ->where('levels.sport_id', $sport)
            ->get();
        $sportNom = Sport::where('name', 'Surf')->firstOrFail();
        return view('etape.index', compact('etapes', 'sportNom'));
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

    //Pour permettre a l'utilisateur de voir la description de l'etape qu'il clic
    public function show($id)
    {
        $level = Level::findOrFail($id);
        $etapes = Etape::where('level_id', $id)->orderBy('id', 'asc')->get();

        return view('etape.show', compact('level', 'etapes'));
    }
}
