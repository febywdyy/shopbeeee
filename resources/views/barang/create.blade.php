@extends('Welcome')
@section('content')
<div class="content-wrapper p-4">
    <html>

    <head>
        <title>form barang</title>
    </head>

    <body>
        <a href="{{url('/')}}">Ke Halaman Utama</a>

        <h1>Form Barang</h1>
        <form action="{{url('/barang')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>Kode</td>
                    <td><input type="text" name="kode"></td>
                </tr>
                <tr>
                    <td>Nama Barang </td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td><input type="text" name="idsatuan"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><input type="text" name="idkategori"></td>
                </tr>
                <tr>
                    <td>Saldo Awal</td>
                    <td><input type="text" name="saldoawal"></td>
                </tr>
                <tr>
                    <td>Harga Beli Akhir</td>
                    <td><input type="text" name="hargabeliakhir"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="text" name="hargajual"></td>
                </tr>
                <tr>
                    <td>Harga Modal</td>
                    <td><input type="text" name="hargamodal"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input type="file" name="foto[]" multiple></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="desc"></td>
                </tr>
                <tr>
                    <td>Pajang</td>
                    <td><input type="text" name="pajang"></td>
                </tr>
                <tr>
                    <td>Saldo Akhir</td>
                    <td><input type="text" name="saldoakhir"></td>
                </tr>
            </table>
            <input type="submit" value="Submit">
        </form>
    </body>

    </html>
    @endsection