<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = User::orderBy('id','asc')->paginate(4);
        return view('utilisateur.index', compact('utilisateurs'));
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
            'username'  =>  'required',
            'email' =>  'required|email|unique:users',
            'fonction' => 'required',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'fonction' =>$request['fonction'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect(route('utilisateur.create'))->with('success', 'Utilisateur Ajouter avec succès');


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
        $utilisateur = User::findOrFail($id);

        return view('utilisateur.edit', compact('utilisateur'));
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
            'username'  =>  'required',
            'email' =>  'required',
            'password' => 'required|confirmed',
        ]);

        $update_utilisateur = User::findOrFail($id);
        $update_utilisateur->username = $request->get('username');
        $update_utilisateur->email = $request->get('email');
        $update_utilisateur->password = $request->get('password');

        $update_utilisateur->update();

        return redirect(route('utilisateur.index'))->with('success', 'Utilisateur modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = User::findOrFail($id);
        $utilisateur->delete();

        return redirect(route('utilisateur.index'))->with('success', 'Utilisateur Supprimer avec succès');
    }


    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "Password changed successfully!");
    }
}
