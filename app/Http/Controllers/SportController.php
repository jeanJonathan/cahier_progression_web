<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Inclusion du modèle
use App\Models\Sport;

class SportController extends Controller
{
    /**
     * Affiche une liste de ressources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        return view('sports.index', compact('sports'));
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sport = Sport::findOrFail($id);
        $levels = $sport->levels;
        return view('sports.show', compact('sport', 'levels'));
    }
}
