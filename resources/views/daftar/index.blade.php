@extends('layouts.FHNS.index')
@section('head')
    <div class="col-sm-6">
        <h1 class="m-0"><small class="text-center">Tambah Akun Organisasi Mahasiswa</small></h1>
    </div>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @error('ormawa_id')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Akun Organisasi Mahasiswa Tersebut Sudah Ada</strong>
        </div>
    @enderror
    @error('username')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Username Tersebut Sudah Ada</strong>
    </div>
@enderror
    <div class="container-fluid">
        <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
            data-target=".bd-example-modal-lg"> Tambah</button>
        <table class="table ">
            <thead class="thead">
                <tr>
                    <th style="width: 1%" class="text-center">No</th>
                    <th class="">Organisasi Mahasiswa</th>
                    <th class="">Username</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            @php
                $nomor = 1;
            @endphp
            @foreach ($user as $u => $value)
                @if ($value->hak_akses == 'user')
                    <tr>
                        <td class="text-center">{{ $nomor }}</td>
                        <td>{{ $value->ormawa->nm_ormawa }}</td>
                        <td>{{ $value->username }}</td>
                        <td>
                            <center><a style="width:200px" class="btn btn-info fas fa-edit mb-2"
                                    href="{{ url('daftar/' . $value->id . '/edit') }}"> Edit Password </a></center>

                            <form action="{{ url('daftar/' . $value->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <center><button class="btn btn-danger far fa-trash-alt" style="width:200px" type="submit"
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
                        <form action="/daftar" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <select name="ormawa_id" id="ormawa_id"
                                    class="form-select  @error('ormawa_id') is-invalid @enderror" style="width: 100%"
                                    required>
                                    <option>Pilih Organisasi Mahasiswa</option>
                                    @foreach ($orm as $o)
                                        <option value="{{ $o->id }}">{{ $o->nm_ormawa }}</option>
                                    @endforeach
                                </select><br>

                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                    id="username"><br>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    id="password"><br>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="password" name="ulangi-password"
                                    class="form-control @error('ulangi-password') is-invalid @enderror" placeholder="ulangi-Password" id="ulangi-password"><br>
                                @error('ulangi-password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="hak_akses" id="hak_askses" value="user">
                                <button type="submit" class="btn btn-info ">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
