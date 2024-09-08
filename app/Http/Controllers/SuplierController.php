<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplier;

class SuplierController extends Controller
{
    public function store_suplier(Request $request){
        $suplier = Suplier::create(['nama' => $request->nama, 'nomor_telepon' => $request->telepon]);
        return redirect()->back();
     }
 
     public function index(){
         $supliers = Suplier::all();
        
         return view('suplier', ['supliers'=> $supliers]);
     }
     public function edit_suplier(Request $request, $id){
         $suplier = Suplier::find($id);
         $suplier->update(['nama' => $request->nama, 'nomor_telepon' => $request->telepon]);
         return redirect()->back();
     }
     public function delete_suplier($id){
         $suplier = Suplier::find($id);
         $suplier->delete();
         return redirect()->back();
     }
}
