<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integration;
class IntegrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $integrations = Integration::all();
        return view('integration.index')->with('integrations',$integrations);
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
    public function filtre(Request $request){
        $integrations = Integration::where('code',$request->input('code'))->get();
        return view('integration.index')->with('integrations',$integrations);

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
        $integration = new Integration();
        $integration->code = $request->input('code');
        $integration->type_defaut = $request->input('typedefaut');
        $integration->qte = $request->input('qte');
        $integration->cause_defaut = $request->input('causedefaut');
        $integration->date_entree = $request->input('date_entree');
        $integration->date_sortie = $request->input('date_sortie');
        $integration->season = $request->input('season');
        $integration->save();
        return redirect('/integrations');
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
    public function printed(Request $request){ 
        //$campionarios = Campionario::all();
        $integrations = Integration::whereIn('id', $request->input("printed"))->get();
        //$fournisseurs = Fournisseur::all();
        return view('integration.print')->with('integrations',$integrations);
                
    }
}
