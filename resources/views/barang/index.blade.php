@extends('Welcome')
@section('content')

<head>
    <title>AdminLTE 3 | Data Barang</title>
</head>

<div class="content-wrapper p-4">

    <h2>DATA BARANG</h2>
    <a href="{{url('barang/create')}}"><button type="button" class="btn btn-success toastsDefaultSuccess">tambah
            data</button></a>
    <br><br>
    <style>
        th {
            text-align: center;
        }

        tr {
            text-align: center;
        }
    </style>
    <table border="2" cellpadding="6" cellspacing="0" class="table table-success table-hover">
        <tr>
        <th> No </th>
            <th> Kode </th>
            <th> Nama Barang </th>
            <th> Satuan </th>
            <th> Kategori </th>
            <th> Saldo Awal </th>
            <th> Harga Beli Akhir </th>
            <th> Harga Jual </th>
            <th> Harga Modal </th>
            <th> Foto </th>
            <th> Deskripsi </th>
            <th> Pajang </th>
            <th> Saldo Akhir </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>

        <?php
                $no=1;
                 $rec=DB::table('barang')
                         ->get();
                 foreach($rec as $key => $value){
            ?>

        <tr>

            <td> {{$no++}}</td>
            <td> {{$value->kode}}</td>
            <td> {{$value->nama}}</td>
            <td> {{$value->idsatuan}}</td>
            <td> {{$value->idkategori}}</td>
            <td> {{$value->saldoawal}}</td>
            <td> {{$value->hargabeliakhir}}</td>
            <td> {{$value->hargajual}}</td>
            <td> {{$value->hargamodal}}</td>
            <td>
                @foreach(json_decode($value->foto) as $foto)
                <img width="70px" src="{{ Storage::url($foto)}}" alt="foto">
                @endforeach
            </td>
            <td> {{$value->desc}}</td>
            <td> {{$value->pajang}}</td>
            <td> {{$value->saldoakhir}}</td>
            <td><a href="{{url('barang/'.$value->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg></button></td>
            <path
                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg></button></td>
            <td>
                <form action="{{ url('barang/'.$value->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger toastsDefaultDanger"
                        onclick="return confirm('yakin ingin menghapus ?')"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                        </svg></button>
                </form>
            </td>
        </tr>
        <?php } ?>
</div>
</table>
@endsection