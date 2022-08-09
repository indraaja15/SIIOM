@extends('layouts.FHNS.index')
@section('head')
<center><h1>Peminjaman Barang Silahkan </h1></center>
    <center>
            <h1 class="m-0"><small class="text-center">Pilih Organisasi Mahasiswa </small></h1>
    </center>
@endsection
@section('content')

    <table class="table ">
        <thead class="thead">
            <tr>
                <th style="width: 10%" class="text-center">No</th>
                <th style="width: 60%">Nama Organisasi Mahasiswa</th>
                <th colspan="2" style="width: 30%" class="text-center">Aksi</th>
            </tr>
        </thead>
        @php
            $nomor=1;
        @endphp
        @foreach ($datas as $key => $value)
        @if (auth()->user()->ormawa_id != $value->id)
        <tr>
            <td class="text-center">{{ $nomor }}</td>
            <td>{{ $value->nm_ormawa }}</td>
            <td>
                <center><a class="btn bg-gradient-info btn-block   " style="width:100px"
                        href="{{ url('pilih/' . $value->id ) }}"> Pilih</a></center>
            </td>
        </tr>
        @php
            $nomor++;
        @endphp
        @endif
            
        @endforeach
    </table>
@endsection
