<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;
use App\Approbation;
class ApprobationsController extends Controller
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
        $approbations = Approbation::all();
        return view('approbation.index')->with('approbations',$approbations)->with('fournisseurs',$fournisseurs);
    }
     public function filtre(Request $request){
        $fournisseurs = Fournisseur::all();
        $approbations = Approbation::where('code',$request->input('code'))->get();
        return view('approbation.index')->with('approbations',$approbations)->with('fournisseurs',$fournisseurs);

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
        $approbation = new Approbation();
        $approbation->code = $request->input('code');
        $approbation->color = $request->input('color');
        $approbation->num_echentient = $request->input('numech');
        $approbation->fournisseur = $request->input('fournisseur');
        $approbation->date = $request->input('date');
        $approbation->decision = $request->input('decision');
        $approbation->note = $request->input('note');
        $approbation->season = $request->input('season');
        $approbation->save();
        return redirect('/approbations');

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
