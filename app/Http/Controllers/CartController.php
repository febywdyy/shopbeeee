<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = DB::table('barang')->where('id', $id)->first();
        
        // Logika untuk menambah produk ke keranjang
        // Anda bisa menggunakan session atau database untuk menyimpan data keranjang

        return redirect()->route('detail.show', ['id' => $id])->with('success', 'Product added to cart successfully!');
    }
}

