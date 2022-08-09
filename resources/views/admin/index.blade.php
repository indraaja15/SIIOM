@extends('layouts.FHNS.index')
@section('head')
    <div class="col-sm-6">
        <h1 class="m-0"><small class="text-center">Akun Admin</small></h1>
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">Tambah</button>
    <table class="table ">
        <thead class="thead">
            <tr>
                <th style="width: 10%" class="text-center">No</th>
                <th style="width: 60%">Username</th>
                <th colspan="2" style="width:30%" class="text-center">Aksi</th>
            </tr>
        </thead>
        @php
            $nomor=1;
        @endphp
        @foreach ($user as $u => $value)
            @if ($value->hak_akses =='admin')
            <tr>
                <td class="text-center">{{ $nomor}}</td>
                <td>{{ $value->username }}</td>
                <td>
                    <form action="{{ url('admin/' . $value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <center><button class="btn btn-danger far fa-trash-alt" style="width:100px" type="submit"
                                onclick="return confirm('Yakin ingin hapus data?')"> Delete
                            </button></center>
                    </form>
                </td>
            </tr>
            @php
                $nomor++;
            @endphp
            @endif
        @endforeach

        {{-- modal view --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="/admin" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf

                            <input type="text" name="username" class="form-control" placeholder="Username" id="username"><br>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password"><br>
                            <input type="password" name="ulangi-password" class="form-control" placeholder="ulangi-Password" id="password"><br>
                            <input type="hidden" name="hak_akses" id="hak_askses" value="admin">
                            <input type="hidden" name="ormawa_id" id="ormawa_id" value="0">
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
