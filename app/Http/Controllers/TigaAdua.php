<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;

class TigaAdua extends Controller
{
    public function index(){
        return view('welcome');
        }
    public function index2(){
        return view('index');
        }
        
    
    public function perkalian(){
        return view('perkalian')
        ;
    }
    public function berita(){
        return view('berita')
        ;
    }


    public function perkalian2(Request $r){
        $a=$r->a;
        $b=$r->b;
        $hasil=$a*$b;
        return view ('perkalian')
        ->with('hasil', $hasil)
        ->with('a',$a)
        ->with('b',$b)
        ;
    }
    public function penjumlahan()
    {
        return view('penjumlahan');
    }
    public function daftarbarang(){

    }
    // public function berita(Request $r){
    // $idberita=$r->idberita;
    // $judul=$r->judul;
    // return view('berita')
    // ->with('idberita', $idberita)
    // ->with('judul', $judul)
    //;
//}

    public function pendaftaran()
    {
        return view('pendaftaran');
}
    public function pendaftaran2(Request $r){
    $now = Carbon::now();
    $hari = $now->day;
    $menit = $now->minute;
    $bulan = $now->month;
    $detik = $now->second;
    $tahun = $now->year;

    $nopendaftaran = $tahun.$bulan.$hari.$menit.$detik;
    $nama=$r->input('nama');
    $sekolah=$r->input('sekolah');
    $nilai=$r->input('nilai');
    $jurusan=$r->input('jurusan');

    return view('/data',compact('nopendaftaran','nama','sekolah','nilai','jurusan'));
    // return view('pendaftaran berhasil'); 
}

// public function index(){
//     return view('index');
//     }

    // public function dosen(){
    //     return view('dosen');
    // }
    // public function dosen2(Request $r){
    //     $nip=$r->input('nip');
    //     $nama=$r->input('nama');
    //     $matakuliah=$r->input('matakuliah');
    //     $fakultas=$r->input('fakultas');
    //     $universitas=$r->input('universitas');

    //     return view('/dosen',compact('nip','nama','matakuliah','fakultas','universitas'));
    // }

    public function store(Request $r){
        $x=array(
            'nip'=>$r->nip,
            'nama'=>$r->nama,
            'matakuliah'=>$r->matakuliah,
            'fakultas'=>$r->fakultas,
            'universitas'=>$r->universitas,
        );

        \DB::table('dosen')->insertgetId($x);

        return view ('dosen.tbdosen')
        ->with('judul','Daftar Dosen')
        ->with('pesan','')
        ;
    }
    public function mahasiswa(){
        return view('mahasiswa');
    }
    public function mahasiswa2(Request $r){
        $nim=$r->input('nim');
        $nama=$r->input('nama');
        $alamat=$r->input('alamat');
        $prodi=$r->input('prodi');
        $fakultas=$r->input('fakultas');
        $universitas=$r->input('universitas');

        return view('/mahasiswa',compact('nim','nama','alamat','prodi','fakultas','universitas'));
    }

    public function store(Request $r){
        $request->validate([
            'nim'=>'required|unique:mahasiswa,nim',
            'nama'=>'required',
            'alamat'=>'required',
            'prodi'=>'required',
            'fakultas'=>'required',
            'universitas'=>'required',
        ]);
        Mahasiswa::create($request);
        return redirect('/mahasiswa')->with('berhasil menambah data');
    }

    public function matakuliah(){
        return view('matakuliah');
    }
    public function matakuliah2(Request $r){
        $kode=$r->input('kode');
        $nama=$r->input('nama');
        $matakuliah=$r->input('matakuliah');
        $sks=$r->input('sks');

        return view('/matakuliah',compact('kode','nama','matakuliah','sks'));
    }

}
