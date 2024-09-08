<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'id_barang', 'total', 'bayar', 'kembalian'];

    public function products(){
        return $this->belongsTo(Product::class, 'id_barang', 'id');
    }  
}
