@extends('layouts.FHNS.index')

@section('content')
    <div class="container-fluid">
        <div class="card-header">
            <i class="fas fa-edit"></i> <span>Update Detail Barang </span><br>
            <div class="card-Body">
                <form action="/detail" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <label for="">Kode Barang</label>
                        <input type="text" disabled class="form-control mb-3" value="KDB-{{ date('Y', strtotime($dBarang->tgl_beli)) }}{{ $dBarang->barang->kategori_id }}{{ $dBarang->barang->ormawa_id }}-00{{ $dBarang->kode_brg }}">
                        <label for="tampil">Nama Barang</label>
                        <input type="text" name="tampil" id="tampil" class="form-control" readonly
                            value="{{ $dBarang->barang->nm_barang }}">
                        <label for="" class="mt-2">Tanggal Pembelian</label>
                        <input type="date" name="tgl_beli" class="form-control mb-3" placeholder="Tanggal Pembelian"
                            value="{{ $dBarang->tgl_beli }}"required>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" id="ket" rows="3" name="ket" >{{ $dBarang->ket }}</textarea>
                        </div>
                        <input type="radio" name="status" id="status1" value="1"
                            @if ($dBarang->status == '1') checked @endif>
                        <label for="status1">Baik</label>
                        <input type="radio" name="status" id="status2" value="2"
                            @if ($dBarang->status == '2') checked @endif>
                        <label for="status2">Cukup Baik</label>
                        <input type="radio" name="status" id="status3" value="3"
                            @if ($dBarang->status == '3') checked @endif>
                        <label for="status2">Kurang Baik</label>
                        <br>
                        <button type="submit" class="btn btn-info ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
