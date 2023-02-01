<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie_plats = Categorie::orderBy('id','asc')->paginate(5);
        return view('categorie.index', compact('categorie_plats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categorie.create');
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
            'nom'  =>  'required|unique:categories',
            'image' => 'required|file:jpg,png,svg',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/categories';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Categorie::create($input);

        return redirect(route('categorie.create'))->with('success', 'Catégorie de plat ajouté avec succès');

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
        $categorie_plats = Categorie::findOrFail($id);
        return view('categorie.edit', compact('categorie_plats'));
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
            'image' => 'required|file:jpg,png,svg',
        ]);


        $update_categorie_plat = Categorie::findOrFail($id);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/categories';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_categorie_plat['image'] = "$profileImage";
        }
        $update_categorie_plat->nom = $request->get('nom');

        $update_categorie_plat->update();

        return redirect(route('categorie.index'))->with('success', 'Catégorie de plat modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie_plat = Categorie::findOrFail($id);
        $categorie_plat->delete();

        return redirect(route('categorie.index'))->with('success', 'Catégorie de plat supprimé avec succès');
    }
}
