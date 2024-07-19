<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index')
            ->with('pesan', '');
    }

    public function create()
    {
        return view('barang.create')
            ->with('judul', 'Form Barang');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            $path = [];
            foreach ($request->file('foto') as $foto) {
            $fotoStore = $foto->store('public/barang');
            $path[] = $fotoStore;
        }
    }

        $x = array(                
            'kode' => $request->kode,
            'nama' => $request->nama,
            'idsatuan' => $request->idsatuan,
            'idkategori' => $request->idkategori,
            'saldoawal' => $request->saldoawal,
            'hargabeliakhir' => $request->hargabeliakhir,
            'hargajual' => $request->hargajual,
            'tglexp' => $request->tglexp,
            'hargamodal' => $request->hargamodal,
            'foto' => json_encode($path),
            'desc' => $request->desc,
            'pajang' => $request->pajang,
            'saldoakhir' => $request->saldoakhir,
        );

        \DB::table('barang')->insertgetId($x);

        return view('barang.index');
    }
    public function show($id)
    {
        return view('barang.editbarang')
            ->with('judul', 'Form Edit Barang')
            ->with('id', $id)
        ;
    }
    public function update(Request $r, $id)
    {
        $x = array(
            'kode' => $r->kode,
            'nama' => $r->nama,
            'idsatuan' => $r->idsatuan,
            'idkategori' => $r->idkategori,
            'saldoawal' => $r->saldoawal,
            'hargabeliakhir' => $r->hargabeliakhir,
            'hargajual' => $r->hargajual,
            'tglexp' => $r->tglexp,
            'hargamodal' => $r->hargamodal,
            'foto' => $r->foto,
            'desc' => $r->desc,
            'pajang' => $r->pajang,
            'saldoakhir' => $r->saldoakhir,
        );

        \DB::table('barang')
            ->where('id', $id)
            ->update($x);

        return view('barang.index')
            ->with('judul', 'Daftar Barang');
    }
    public function destroy($id)
    {
        \DB::table('barang')
            ->where('id', $id)
            ->delete();
        return view('barang.index');
    }

}