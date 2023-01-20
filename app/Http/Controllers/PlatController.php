<?php

namespace App\Http\Controllers;

use App\Models\plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plats = plat::orderBy('id','asc')->paginate(4);
        return view('plat.index', compact('plats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('plat.create');
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
            'nom'  =>  'required|unique:plats',
            'description' =>  'required|max:255',
            'images' => 'required|file:jpg,png,svg',
            'prix' => 'required|integer',
            'disponible' => 'required',

        ]);

        return plat::create([
            'nom' => $request['nom'],
            'description' => $request['description'],
            'images' =>$request['images'],
            'prix' =>$request['prix'],
            'disponible' =>$request['disponible'],
        ]);

        return redirect(route('plat.create'))->with('success', 'Personnage Ajouter avec succès');

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
        $plat = plat::findOrFail($id);
        return view('plat.edit', compact('plat'));
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
        $request->validate([
            'nom'  =>  'required',
            'description' =>  'required|max:255',
            'images' => 'required|file:jpg,png,svg',
            'prix' => 'required|integer',
            'disponible' => 'required|boolean',

        ]);

        $update_plat = plat::findOrFail($id);
        $update_plat->nom = $request->get('nom');
        $update_plat->description = $request->get('description');
        $update_plat->images = $request->get('images');
        $update_plat->prix = $request->get('prix');
        $update_plat->disponible =  $request->get('disponible');

        $update_plat->update();

        return redirect('/utilisateur')->with('success', 'Plat Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plat = plat::findOrFail($id);
        $plat->delete();

        return redirect('/plat')->with('success', 'Plat Supprimer avec succès');
    }
}
