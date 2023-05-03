<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape;
//On va utiliser la table level a cause du sport qui sera interessant pour les methode index des differents sport
use App\Models\Level;

class EtapeController extends Controller
{
    public function index()
    {
        $etapes = Etape::all();
        return view('etape.index', compact('etapes'));
        //return view('etapes', ['etapes' => $etapes]);
    }
    public function indexKiteSurf()
    {
        return view('kiteSurf');
    }
    public function indexWingfoil()
    {
        return view('wingfoil');
    }
    public function indexSurf()
    {
        return view('surf');
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

    /*methode pour récupère toutes les étapes associées au sport "wingfoil" depuis la base de données et les passe à la vue "wingfoil"*/
    /*car j'ai une seule table etape*/
    public function wingfoil()
    {
        //where pour filtrer les etapes en fonction du sport
        $etapes = Level ::where('sport', '1')->get(); // 1 correspond au wingfoil
        //compact pour passee les donnees des etapes a la vue
        return view('wingfoil', compact('etapes'));
    }

}
