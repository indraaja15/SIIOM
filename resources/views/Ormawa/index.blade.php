@extends('layouts.FHNS.index')
@section('head')
    <center>
            <h1 class="m-0"><small class="text-center">Daftar Organisasi Mahasiswa</small></h1>
    </center>
@endsection
@section('content')
    <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">Tambah</button>
        <br>
    <table class="table " id="tampil1">
        <thead class="thead">
            <tr>
                <th style="width: 10%" class="text-center">No</th>
                <th style="width: 60%">Nama Organisasi Mahasiswa</th>
                <th colspan="3" style="width: 30%" class="text-center">Aksi</th>
            </tr>
        </thead>
        @php
            $nomor=1;
        @endphp
        @foreach ($datas as $key => $value)
            <tr>
                <td class="text-center">{{ $nomor }}</td>
                <td>{{ $value->nm_ormawa }}</td>
                <td>
                    <center><a class="btn btn-info fas fa-edit" style="width:100px"
                            href="{{ url('ormawa/' . $value->id . '/edit') }}"> Edit</a></center>
                </td>
                <td>
                    <center><a class="btn btn-warning bi bi-search" style="width:150px"
                            href="{{ url('cek/' . $value->id) }}"> Detail Barang</a></center>
                </td>
                <td>
                    <form action="{{ url('ormawa/' . $value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <center> <button style="width:100px" class="btn btn-danger far fa-trash-alt" type="submit" onclick="return confirm('Yakin ingin hapus data?')"> Delete
                            </button></center>
                    </form>
                </td>
            </tr>
            @php
                $nomor++;
            @endphp
        @endforeach
    </table>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ url('ormawa') }}" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            <input type="Text" name="nm_ormawa" class="form-control"
                                placeholder="Nama Organisasi Mahasiswa"><br>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
