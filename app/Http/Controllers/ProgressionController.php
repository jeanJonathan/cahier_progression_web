<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progression;

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
        $validatedData = $request->validate([
            'level_id' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'location' => 'required|string',
            'weather' => 'nullable|string',
            'notes' => 'nullable|string',
            'photo_file' => 'nullable|file',
            'video_file' => 'nullable|file|max:50000|mimetypes:video/mp4,video/mpeg,video/quicktime',
            'etape_id' => 'required',
            'surf_progression' => 'nullable|string',
            'kite_progression' => 'nullable|string',
            'wingfoil_progression' => 'nullable|string',
        ]);

        $progression = new Progression([
            'level_id' => $validatedData['level_id'],
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'weather' => $validatedData['weather'],
            'notes' => $validatedData['notes'],
            'user_id' => auth()->user()->id,
            'etape_id' => $validatedData['etape_id'],
            'surf_progression' => $validatedData['surf_progression'],
            'kite_progression' => $validatedData['kite_progression'],
            'wingfoil_progression' => $validatedData['wingfoil_progression'],
        ]);
        $progression->save();

        // Ajout de la photo s'il y en a une
        if ($request->hasFile('photo_file')) {
            $photo = $request->file('photo_file');
            $photoFile = $photo->store('photos', 'public');
            $progression->photo_file = $photoFile;
            $progression->save();
        }

        // Ajout de la vidéo s'il y en a une
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file');
            $videoFile = $video->store('videos', 'public');
            $progression->video_file = $videoFile;
            $progression->save();
        }

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
        $progression = Progression::find($id);
        return view('progressions.edit', compact('progression'));

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
        $progression = Progression::find($id);
        $progression->kite_id = $request->kite_id;
        $progression->level_id = $request->level_id;
        $progression->date = $request->date;
        $progression->location = $request->location;
        $progression->weather = $request->weather;
        $progression->notes = $request->notes;
        $progression->photo_url = $request->photo_url;
        $progression->video_url = $request->video_url;
        $progression->etape_id = $request->etape_id;
        $progression->surf_progression = $request->surf_progression;
        $progression->kite_progression = $request->kite_progression;
        $progression->wingfoil_progression = $request->wingfoil_progression;
        $progression->save();

        return redirect()->route('progressions.show', ['progressions' => $progression])->with('success', 'La progressions a été mise à jour avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progression = Progression::find($id);
        $progression->delete();

        return redirect()->route('progressions.index')->with('success', 'La progressions a été supprimée avec succès !');

    }
}
