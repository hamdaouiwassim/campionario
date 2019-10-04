<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Accessoire;
use App\Fournisseur;
use App\Campionario;
use App\Fichecontrole;
use Illuminate\Support\Facades\DB;
use Auth;


class CampionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fichescontroles = Fichecontrole::all();
        $campionarios = Campionario::orderBy('created_at','desc')->get();
        $accessoires = Accessoire::all();
        $fournisseurs = Fournisseur::all();
        return view('camionarios.index')->with('campionarios',$campionarios)->with('fournisseurs',$fournisseurs)->with('accessoires',$accessoires)->with('fichescontroles',$fichescontroles);
    }
    public function bloque($id){
            
            DB::table('campionarios')->where('id', $id)          
                        ->update(['stat' => 0]);
        
            return redirect('/campionarios');

    }
    public function debloque($id){
            
            DB::table('campionarios')->where('id', $id)          
                        ->update(['stat' => 1]);
        
            
            return redirect('/campionarios');

    }
    public function filter(Request $request){


        if ( $request->input('filtre') == 1 ){
                $campionarios = Campionario::orderBy('created_at','desc')->get();
        }else if ($request->input('filtre') == 2 ){
                    $campionarios = Campionario::whereDate('created_at', '=', date('Y-m-d'))->orderBy('created_at','desc')->get();
        
        }else if ($request->input('filtre') == 3 ){
                    $campionarios = Campionario::whereMonth('created_at', '=', date('m'))
                    ->whereYear('created_at', '=', date('Y'))->orderBy('created_at','desc')->get();
        }

        $fichescontroles = Fichecontrole::all();
        $accessoires = Accessoire::all();
        $fournisseurs = Fournisseur::all();
        return view('camionarios.index')->with('campionarios',$campionarios)->with('fournisseurs',$fournisseurs)->with('accessoires',$accessoires)->with('fichescontroles',$fichescontroles);

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
        $campionario = new Campionario();
        $campionario->idaccessoire = $request->input('idaccessoire');
        $campionario->idfournisseur = $request->input('idfournisseur');
        $campionario->qte = $request->input('qte');
        $campionario->numfacture = $request->input('numfacture');
        $campionario->user = Auth::user()->id;
        $campionario->saison = $request->input('saison');
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
    public function print($id){
        $fichedecontrole =  Fichecontrole::find($id);
        $campionarios = Campionario::all();
        $accessoires = Accessoire::all();
        $fournisseurs = Fournisseur::all();
        return view('camionarios.print')->with('campionarios',$campionarios)->with('fournisseurs',$fournisseurs)->with('accessoires',$accessoires)->with('fichecontrole',$fichedecontrole);
    }
}
