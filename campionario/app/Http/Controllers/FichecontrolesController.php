<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fichecontrole;
use App\Campionario;
use App\Accessoire;
use App\Fournisseur;
class FichecontrolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $filec = new Fichecontrole();
        $filec->user = $request->input('user');
        $filec->numero = $request->input('numero');
        $filec->idaccessoire = $request->input('idaccessoire');
        $filec->idfournisseur = $request->input('idfournisseur');
        $filec->couleuraccessoire = $request->input('couleuraccessoire');
        $filec->typecontrole = $request->input('typecontrole');
        $filec->probleme = $request->input('probleme');
        $filec->decision = $request->input('decision');
        $filec->idcampionario = $request->input('idcampionario');
        $filec->save();

        $campionario = Campionario::find($request->input('idcampionario'));
        $campionario->file = 1;
        $campionario->save();
        return redirect('/campionarios');
        


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
    public function printed(Request $request,$id){
            
        $accessoires = Accessoire::all();
        $fichecontrole = Fichecontrole::find($id);
        $fournisseurs = Fournisseur::all();
        return view('print')->with('accessoires',$accessoires)->with('fournisseurs',$fournisseurs)->with('fichecontrole',$fichecontrole);
                
        }
}
