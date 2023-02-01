<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
        $categorieplats = Categorie::orderBy('id', 'asc')->get();
        $plats = plat::orderBy('id','asc')->paginate(3);

        return view('plat.index', compact('plats', 'categorieplats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::orderBy('id', 'asc')->get();

        return view ('plat.create', compact('categories'));
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
            'categories_id' => 'required|max:3',
            'nom'  =>  'required|unique:plats',
            'description' =>  'required|max:255',
            'images' => 'required|file:jpg,png,svg',
            'prix' => 'required|integer',
            'disponible' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('images')) {
            $destinationPath = 'images/plats';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }
        Plat::create($input);

        return redirect(route('plat.create'))->with('success', 'Plat ajouté avec succès');
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
        $categories = Categorie::orderBy('id', 'asc')->get();
        $plats = plat::findOrFail($id);

        return view('plat.edit', compact('plats', 'categories'));
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
            'categories_id' => 'required|integer',
            'nom'  =>  'max:255',
            'description' =>  'max:255',
            'images' => 'file:jpg,png,svg',
            'prix' => 'integer',
            'disponible' => 'required',
        ]);

        $update_plats = plat::findOrFail($id);

        if ($image = $request->file('images')) {
            $destinationPath = 'images/plats';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_plats['images'] = "$profileImage";
        }
        $update_plats->categories_id = $request->get('categories_id');
        $update_plats->nom = $request->get('nom');
        $update_plats->prix = $request->get('prix');
        $update_plats->disponible =  $request->get('disponible');
        $update_plats->description = $request->get('description');

        $update_plats->update();

        return redirect(route('plat.index'))->with('success', 'Plat modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plats = plat::findOrFail($id);
        $plats->delete();

        return redirect(route('plat.index'))->with('success', 'Plat supprimé avec succès');
    }
}
