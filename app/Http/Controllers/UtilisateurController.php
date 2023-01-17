<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::get()->all();
        return view('utilisateur.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('utilisateur.create');
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
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'photo_profil'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg',
            'fonction' => 'required',
            'password' => 'required',
        ]);

        $file_name = time() . '.' . request()->photo_profil->getClientOriginalExtension();

        request()->profil_image->move(public_path('images'), $file_name);

        $utilisateur = new User;

        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->fonction = $request->fonction;
        $utilisateur->photo_profil = $file_name;
        $utilisateur->password = $password;



        $utilisateur->save();

        return redirect()->route('utlisateur.index')->with('success', 'Student Added successfully.');
  
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
        //
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
