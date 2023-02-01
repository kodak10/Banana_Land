<?php

namespace App\Http\Controllers;

use App\Models\plat;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Paniers = DB::table('paniers')
                            ->join('plats', 'paniers.id', '=', 'plats.id')
                            ->select('plats.*', 'plats.nom', 'plats.images')
                            ->orderBy('nom' , 'asc')
                            ->paginate(8);

        $PanierItems = panier::get();

        return view('panier.index', compact('Paniers', 'PanierItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'plats_id' => 'required',
        ]);

        $input = $request->all();
        Panier::create($input);

        return redirect(route('vente.index'))->with('success', 'Ajouté au panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $panier = panier::findOrFail($id);
        $panier->delete();

        return redirect(route('panier.index'))->with('success', 'Plat Supprimer avec succès');
    }
}
