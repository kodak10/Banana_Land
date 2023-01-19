<?php

namespace App\Http\Controllers;

use App\Models\chariot;
use Illuminate\Http\Request;

class ChariotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chariots = chariot::orderBy('id','asc')->paginate(4);
        return view('chariot.index', compact('chariots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('chariot.create');
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
            'nom'  =>  'required|unique:chariots',
            'cni' =>  'required|max:30',
            'contact' => 'required|min:10|integer',
        ]);

        return chariot::create([
            'nom' => $request['nom'],
            'cni' => $request['cni'],
            'contact' =>$request['contact'],
        ]);

        return redirect('/chariot.index')->with('success', 'Personnage Ajouter avec succès');
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
        $chariot = chariot::findOrFail($id);
        return view('chariot.edit', compact('chariot'));
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
            'nom'  =>  'required|unique:plats',
            'cni' =>  'required|max:255',
            'contact' => 'required',
        ]);

        $update_chariot = chariot::findOrFail($id);
        $update_chariot->nom = $request->get('nom');
        $update_chariot->cni = $request->get('cni');
        $update_chariot->contact = $request->get('contact');

        $update_chariot->update();

        return redirect('/chariot')->with('success', 'Chariot Modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chariot = chariot::findOrFail($id);
        $chariot->delete();

        return redirect('/chariot')->with('success', 'Chariot Supprimer avec succès');
    }
}
