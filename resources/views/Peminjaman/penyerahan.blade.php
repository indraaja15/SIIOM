@extends('layouts.FHNS.index')
@section('head')
    <center>
        <h1 class="m-3"><small class="text-center">Data Penyerahan</small></h1>
    </center>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header">
        <i class="fas fa-edit"></i> <span>Input Detail Barang Penyerahan</span><br>
    <form action="/penyerahanBrg" method="post" enctype="multipart/form-data">
        <div class="body">
        @csrf
        @php
            $a = -1;
        @endphp
        @foreach ($penyerahan as $p)
        <input type="hidden" name="peminjaman_id" id="peminjaman_id" value="{{ $p->peminjaman_id }}">
            @foreach ($brg as $b)
                @if ($b->id == $p->barang_id)
                    @php
                        $a++;
                    @endphp
                    
                    <hr>
                    <input type="hidden" name="barang_id{{ $a }}" value="{{ $b->id }}">
                    <label>Nama Barang : {{ $b->nm_barang }}</label>
                    <br>
                @endif
            @endforeach

            @for ($i = 0; $i < $p->qty; $i++)
                <div class="form-group mb-4">
                    <select name="kode_brg{{ $a }}{{ $i }}" id="kode_brg" class="form-select"
                        style="width: 100%" required>
                        <option value="">Pilih Kode Barang</option>
                        @foreach ($dbrg as $item)
                            @if ($item->barang_id == $p->barang_id)
                                <option value="{{ $item->kode_brg }}">
                                    KDB-{{ date('Y', strtotime($item->tgl_beli)) }}{{ $item->barang->id }}{{ $item->barang->ormawa_id }}-00{{ $item->kode_brg }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endfor
        @endforeach
        <div class="input-group mb-3">
            <label for="">Upload Foto Penyerahan</label>
        </div>
        <div class="mb-3">
            <input class="form-control" name="BaPeminjaman" type="file" id="formFile"
                placeholder="Foto Barang" required>
        </div>
        <button type="submit" class="btn btn-info mt-3">Simpan</button>
            </div>
    </form>
</div>
@endsection
