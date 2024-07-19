<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index (){
        return view ('detail.detail');
    }
    public function show($id)
    {
        $product = DB::table('barang')->where('id', $id)->first();
        return view('detail.detail')
        ->with('product', $product);
    }
}
