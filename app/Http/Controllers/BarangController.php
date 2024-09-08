<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BarangController extends Controller
{
    public function store(Request $request){
       $product = Product::create(['nama' => $request->nama_barang, 'jumlah' => $request->jumlah, 'satuan' => $request->satuan, 'harga' => $request->harga]);
       return redirect()->back();
    }

    public function index(){
        $products = Product::all();
        return view('barang',compact('products'));
    }
    public function edit_barang(Request $request, $id){
        $product = Product::find($id);
        $product->update(['nama' => $request->nama, 'jumlah' => $request->jumlah, 'satuan' => $request->satuan, 'harga' => $request->harga]);
        return redirect()->back();
    }
    public function delete_barang($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
