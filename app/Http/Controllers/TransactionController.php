<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    public function store_transaksi(Request $request){
        $transaction = Transaction::create(['kode' => $request->kode_barang, 'id_barang' => $request->barang, 'total' => $request->total, 'bayar' => $request->bayar, 'kembalian' => $request->kembalian]);
        return redirect()->back();
     }
 
     public function index(){
         $transactions = Transaction::all();
         $products = Product::all();
         return view('transaksi', ['transactions'=> $transactions,'products'=> $products]);
     }
     public function edit_transaksi(Request $request, $id){
         $transaction = Transaction::find($id);
         $transaction->update(['kode' => $request->kode_barang, 'id_barang' => $request->barang, 'total' => $request->total, 'bayar' => $request->bayar, 'kembalian' => $request->kembalian]);
         return redirect()->back();
     }
     public function delete_transaksi($id){
         $transaction = Transaction::find($id);
         $transaction->delete();
         return redirect()->back();
     }
}
