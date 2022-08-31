@extends('layouts.FHNS.index')
@section('head')
    <center>
        <h1 class="m-3"><small class="text-center">Data Penyerahan</small></h1>
    </center>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header mb-3">
            <i class="fas fa-edit"></i> <span>Detail Data Barang Penyerahan</span>
            <div class="body">
                @foreach ($dpenyerahan as $dp)
                    @foreach ($barang as $b)
                        @if ($dp->barang_id == $b->id)
                            <label for="">Nama barang</label>
                            <input type="text" readonly class="form-control" value="{{ $b->nm_barang }} ">
                        @endif
                    @endforeach
                    <br>
                    @foreach ($dbarang as $db)
                        @if ($db->kode_brg == $dp->kode_brg)
                            <label for="">Kode barang</label>
                            <input type="text" readonly class="form-control"
                                value="KDB-{{ date('Y', strtotime($db->tgl_beli)) }}{{ $db->barang->id }}{{ $db->barang->ormawa_id }}-00{{ $db->kode_brg }}">
                            <hr>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    @endsection
