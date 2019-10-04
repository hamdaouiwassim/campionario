<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index')->with('fournisseurs',$fournisseurs);
    }
    public function filter(Request $request){
        
        $fournisseurs = Fournisseur::where('fullname','like','%'.$request->input('fullname').'%')->get();
        return view('fournisseurs.index')->with('fournisseurs',$fournisseurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fournisseur = new Fournisseur();
        $fournisseur->fullname = $request->input('fullname');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->email = $request->input('email');
        $fournisseur->save();
        return redirect("/fournisseurs");
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
        $fournisseur = Fournisseur::find($id);
        //var_dump($fournisseur);
        $fournisseur->fullname = $request->input('fullname');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->email = $request->input('email');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->update();
        return redirect("/fournisseurs");
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
        $fournisseur = Fournisseur::find($id);
        //var_dump($fournisseur);
        $fournisseur->delete();
        return redirect("/fournisseurs");
    }
}
