<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation;

class ReclamationsController extends Controller
{
    //
    public function index(){
    	$reclamations = Reclamation::all();
    	return view('reclamation.index')->with('reclamations',$reclamations);

    }
    public function filter(Request $request){
    	$reclamations = Reclamation::where('code_accessory',$request->input('code'))->get();
    	return view('reclamation.index')->with('reclamations',$reclamations);

    }
    public function store(Request $request){
        $reclamation = new Reclamation();
        $reclamation->claimed_by = $request->input("claimed_by");
        $reclamation->supplier = $request->input("supplier") ;
        $reclamation->season = $request->input("season") ;
        $reclamation->supplier_invoice = $request->input("supplier_invoice") ;
        $reclamation->code_accessory = $request->input("code_accessory") ;
        $reclamation->color = $request->input("color") ;
        $reclamation->family = $request->input("family") ;
        $reclamation->sfamily = $request->input("sfamily") ;
        $reclamation->date_receive = $request->input("date_receive") ;
        $reclamation->price = $request->input("price") ;
        $reclamation->quantity = $request->input("quantity") ;
        $reclamation->total_amount = $request->input("total_amount") ;
        $reclamation->claimed_accessory = $request->input("claimed_accessory") ;
        $reclamation->garments = $request->input("garments") ;
        $reclamation->industrial_unit_cost = $request->input("industrial_unit_cost") ;
        $reclamation->out_of_standard_detected = $request->input("out_of_standard_detected") ;
        $reclamation->QC = $request->input("QC") ;
        $reclamation->total_amount_charged = $request->input("total_amount_charged") ;
        $reclamation->required_by = $request->input("required_by") ;
        $reclamation->referred_to_month = $request->input("referred_to_month") ;
        $reclamation->claim_issued = $request->input("claim_issued") ;
        $reclamation->approved_by_supplier = $request->input("approved_by_supplier") ;
        $reclamation->debit_note = $request->input("debit_note") ;
        $reclamation->validation = $request->input("validation") ;
        $reclamation->save();
        return redirect('/reclamations');
    }

}
