<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kites = Kite::all();
        return view('kites.index', compact('kites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'custom' => 'boolean'
        ]);

        $kite = new Kite([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'custom' => $request->get('custom') ? true : false
        ]);

        $kite->save();

        return redirect('/kites')->with('success', 'Kite ajouté avec succès !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kite = Kite::find($id);
        return view('kites.show', compact('kite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kite = Kite::find($id);
        return view('kites.edit', compact('kite'));
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
