<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accessoire;
use App\Fournisseur;
class AccessoiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accessoires = Accessoire::all();
        $fournisseurs = Fournisseur::all();
        return view('accessoires.index')->with('accessoires',$accessoires)->with('fournisseurs',$fournisseurs);
    }
    public function filter(Request $request){
        $accessoires = Accessoire::where('code',$request->input('code'))->get();
        $fournisseurs = Fournisseur::all();
        return view('accessoires.index')->with('accessoires',$accessoires)->with('fournisseurs',$fournisseurs);
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
       
        
        $accessoire = new Accessoire();
        $accessoire->famille = $request->input('famille');
        $accessoire->sfamille = $request->input('sfamille');
        $accessoire->fournisseur = $request->input('fournisseur');
        $accessoire->code = $request->input('code');
        $accessoire->color = $request->input('color');
        $accessoire->payes = $request->input('payes');
        $accessoire->description = $request->input('description');
        $accessoire->save();
        return redirect("/accessoires");
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
        $accessoire = Accessoire::find($id);
        //var_dump($accessoire);
        $accessoire->famille = $request->input('famille');
        $accessoire->sfamille = $request->input('sfamille');
        $accessoire->code = $request->input('code');
        $accessoire->color = $request->input('color');
        $accessoire->fournisseur = $request->input('fournisseur');
        $accessoire->payes = $request->input('payes');
        $accessoire->description = $request->input('description');
        $accessoire->update();
        return redirect("/accessoires");
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
        $accessoire = Accessoire::find($id);
        //var_dump($accessoire);
        $accessoire->delete();
        return redirect("/accessoires");
    }
}
