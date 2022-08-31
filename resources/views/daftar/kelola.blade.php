@extends('layouts.FHNS.index')
@section('head')
    <div class="col-sm-6">
        <h1 class="m-0"><small class="text-center">Tambah Akun Personal {{ $title->ormawa->nm_ormawa }}</small></h1>
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
                    <th class="">Username</th>
                    <th class="">Password</th>
                    <th class="">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            @php
                $nomor = 1;
            @endphp
            @foreach ($user as $u => $value)
                @if ($value->hak_akses != 'user')
                    @if ($value->ormawa_id == auth()->user()->ormawa_id)
                        <tr>
                            <td class="text-center">{{ $nomor }}</td>
                            <td>{{ $value->username }}</td>
                            <td>*************</td>

                            @if ($value->hak_akses != 'nonaktif')
                                <td><span class="badge badge-success text-light" style="width: 90px">Aktif</span></td>
                            @else
                                <td><span class="badge badge-danger text-light" style="width: 90px">Tidak Aktif</span></td>
                            @endif

                            <td>
                                <center><a style="width:200px" class="btn btn-info fas fa-edit mb-2"
                                        href="{{ url('kelola/' . $value->id . '/edit') }}"> Edit Password </a></center>
                                @if ($value->hak_akses == 'opr')
                                    <form action="{{ url('nonaktif/' . $value->id) }}" method="POST">
                                        @csrf
                                        <center><button class="btn btn-danger far fa-circle" name="nonaktif"
                                                style="width:200px" type="submit"
                                                onclick="return confirm('Yakin ingin nonaktifkan akun ?')"> Nonaktifkan
                                            </button></center>

                                    </form>
                                @elseif ($value->hak_akses == 'nonaktif')
                                    <form action="{{ url('aktif/' . $value->id) }}" method="POST">
                                        @csrf
                                        <center><button class="btn btn-success far fa-circle" name="aktif"
                                                style="width:200px" type="submit"
                                                onclick="return confirm('Yakin ingin aktifkan akun ?')"> Aktifkan
                                            </button></center>
                                    </form>
                                @endif

                            </td>
                        </tr>
                        @php
                            $nomor++;
                        @endphp
                    @endif
                @endif
            @endforeach

            {{-- modal view --}}
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="/simpankelola" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <select name="ormawa_id" id="ormawa_id"
                                    class="form-select  @error('ormawa_id') is-invalid @enderror" style="width: 100%"
                                    required>
                                    @foreach ($orm as $o => $value)
                                        @if (auth()->user()->ormawa_id == $value->id)
                                            <option value="{{ $value->id }}">{{ $value->nm_ormawa }}</option>
                                        @endif
                                    @endforeach
                                </select><br>

                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
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
                                    class="form-control @error('ulangi-password') is-invalid @enderror"
                                    placeholder="ulangi-Password" id="ulangi-password"><br>
                                @error('ulangi-password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="hak_akses" id="hak_askses" value="opr">
                                <button type="submit" class="btn btn-info ">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
