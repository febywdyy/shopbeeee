@extends('Welcome')
@section('content')
<div class="content-wrapper p-4">

  <head>
    <title></title>
  </head>

  <body>
    <?php
        $rec=\DB::table('barang')
                        ->where('id',$id)
                        ->first();
    ?>

    <h1>Form Edit Barang</h1>
    <form action="{{url('barang/'.$id)}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{!! csrf_token()!!}">
      <input type="hidden" name="id" value="{{$id}}">
      {{method_field('PUT')}}
      <div class="row mb-3">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="kode" value="{{$rec->kode ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="{{$rec->nama ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="idsatuan" value="{{$rec->idsatuan ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="idkategori" value="{{$rec->idkategori ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Saldo Awal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="saldoawal" value="{{$rec->saldoawal ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Jarga Beli Akhir</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="hargabeliakhir" value="{{$rec->hargabeliakhir ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Harga Jual</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="hargajual" value="{{$rec->hargajual ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Harga Modal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="hargamodal" value="{{$rec->hargamodal ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="foto[]" multiple>
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="desc" value="{{$rec->desc ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Pajang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="pajang" value="{{$rec->pajang ?? ''}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Saldo Akhir</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="saldoakhir" value="{{$rec->saldoakhir ?? ''}}">
        </div>
      </div>
      <button type="submit">Simpan</button>
    </form>
  </body>

  </html>
  @endsection