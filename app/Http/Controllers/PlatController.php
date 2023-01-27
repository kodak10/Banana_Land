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
        $plats = plat::orderBy('id','asc')->paginate(4);

        return view ('plat.create', compact('categories','plats'));
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

        return redirect(route('plat.create'))->with('success', 'Plat ajouter avec succès');
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
            'nom'  =>  'max:255',
            'description' =>  'max:255',
            'images' => 'file:jpg,png,svg',
            'prix' => 'integer',
            'disponible' => 'boolean',

        ]);

        $update_plat = plat::findOrFail($id);



        $update_plat->nom = $request->get('nom');
        $update_plat->description = $request->get('description');
        $update_plat->images = $request->get('images');
        $update_plat->prix = $request->get('prix');
        $update_plat->disponible =  $request->get('disponible');

        if ($image = $request->file('images')) {
            $destinationPath = 'images/plats';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }

        $update_plat->update();

        return redirect(route('plat.index'))->with('success', 'Plat modifier avec succès');
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

        return redirect(route('plat.index'))->with('success', 'Plat supprimer avec succès');
    }
}
