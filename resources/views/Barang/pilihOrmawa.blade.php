@extends('layouts.FHNS.index')
@section('head')
    <center>
            <h1 class="m-0"><small class="text-center">Cek Barang Organisasi  </small></h1>
    </center>
@endsection
@section('content')

    <table class="table ">
        <thead class="thead">
            <tr>
                <th style="width: 10%" class="text-center">No</th>
                <th style="width: 60%">Nama Organisasi Mahasiswa</th>
                <th class="text-center">Aksi</th>
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
                <center><a class="btn btn-info bi bi-search" 
                        href="{{ url('cek/' . $value->id ) }}"> Cek Barang</a></center>
            </td>
        </tr>
        @php
            $nomor++;
        @endphp
        @endif 
        @endforeach
    </table>
@endsection
