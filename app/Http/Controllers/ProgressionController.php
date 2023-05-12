<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progression;
use App\Models\Level;
use Illuminate\Support\Facades\Storage;
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
    public function create(Request $request)
    {
        // Récupérer l'identifiant de l'étape à partir de l'URL generer apres avoir cliquer sur le bouton valider etape
        $etape_id = $request->input('etape_id');
        // Récupérer l'objet Level car c'est level qui est lie a la table progression
        $etape = Level::findOrFail($etape_id);

        // Afficher le formulaire de création de progression
        return view('progressions.create',compact('etape','etape_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pour récupérer l'identifiant de l'étape à partir de la requête
        $etape_id = $request->input('etape_id');

        $validatedData = $request->validate([
            'date' => 'required|date|before_or_equal:today',
            'location' => 'required|string',
            'weather' => 'nullable|string',
            'notes' => 'nullable|string',
            'video_file' => 'nullable|file|max:50000|mimetypes:video/mp4,video/mpeg,video/quicktime',
            //on a supprimer etape_id car deja initialise
            'surf_progression' => 'nullable|string',
            'kite_progression' => 'nullable|string',
            'wingfoil_progression' => 'nullable|string',
        ]);

        // Initialisation des variables pour les chemins d'accès aux fichiers
        $photo1_url= null;
        $photo2_url= null;
        $photo3_url= null;

        //Initialisation d'une instance de progression
        // Création d'une instance de Progression avec les données validées
        $progression = new Progression([
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'weather' => $validatedData['weather'] ?? null,
            'notes' => $validatedData['notes'] ?? null,
            'photo1_url'=> $photo1_url,
            'photo2_url'=> $photo2_url,
            'photo3_url'=> $photo3_url,
            'etape_id' => $etape_id,
            'surf_progression' => $validatedData['surf_progression'] ?? null,
            'kite_progression' => $validatedData['kite_progression'] ?? null,
            'wingfoil_progression' => $validatedData['wingfoil_progression'] ?? null,
        ]);

        //Implementation de la fonctionnalite pour creer chaque dossier de chaque utilisateur
        //Pour que le dossier de chaque utilisatuer soit presentable pour les (date et nom du user
        $date = date('Y-m-d');
        $user = auth()->user();
        $folder_name = $user->name . '_' . $user->phone . '_' . $date;
        if ($request->hasFile('photo1')) {
            $path = Storage::disk('public')->putFileAs($folder_name, $request->file('photo1'), 'photo1.jpg');
            $photo1_url = Storage::url($path);
        }
        if ($request->hasFile('photo2')) {
            $path = Storage::disk('public')->putFileAs($folder_name, $request->file('photo2'), 'photo2.jpg');
            $photo2_url = Storage::url($path);
        }
        if ($request->hasFile('photo3')) {
            $path = Storage::disk('public')->putFileAs($folder_name, $request->file('photo3'), 'photo3.jpg');
            $photo3_url = Storage::url($path);
        }
        /*
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file')->store('public/videos');
            $video_url = Storage::url($video);
        }
        */

        // Création d'une instance de Progression avec les données validées
        $progression = new Progression([
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'weather' => $validatedData['weather'] ?? null,
            'notes' => $validatedData['notes'] ?? null,
            'photo1_url'=> $photo1_url,
            'photo2_url'=> $photo2_url,
            'photo3_url'=> $photo3_url,
            'etape_id' => $etape_id,
            'surf_progression' => $validatedData['surf_progression'] ?? null,
            'kite_progression' => $validatedData['kite_progression'] ?? null,
            'wingfoil_progression' => $validatedData['wingfoil_progression'] ?? null,
        ]);


        // Associer la progression à l'utilisateur connecté
        $progression->user_id = auth()->id();

        // Associer la progression à l'étape sélectionnée (si elle est spécifiée)
/*
        if ($validatedData['etape_id']) {
            $progression->etape_id = $validatedData['etape_id'];
        }
    */

        // Associer la progression au niveau de pratique sélectionné (si il est spécifié)
        /*if ($validatedData['level_id']) {
            $progression->level_id = $validatedData['level_id'];
        }
        */
        //
        //$progression->etape_id = $etape_id; // Ajouter l'identifiant de l'étape

        // Sauvegarde de la progression dans la base de données
        $progression->save();

        // Redirection de l'utilisateur vers la liste des progressions
        // Message de réussite
        $request->session()->flash('success', 'Votre progression a été enregistrée avec succès.');

        // Affichage de la fenêtre modale après la validation de la progression
        return redirect()->intended()->with('success', true);

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
