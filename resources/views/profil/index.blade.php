@extends('layouts.FHNS.index')
@section('head')
    <center>
        <h1 class="m-0"><small class="text-center">Profil </small></h1>
    </center>
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-fluid">
    <div class="card-header">
        <i class="fas fa-edit"></i> <span>Edit No Telp Ormawa</span><br>
        <div class="card-Body mt-4">
            <form action="{{ url('noTelp/' . $model->ormawa->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <input type="hidden" name="nm_ormawa" id="nm_ormawa" value="{{ $model->ormawa->nm_ormawa }}">
                    <input type="text" name="no_telp" class="form-control" placeholder="No Telp Ormawa" id="no_telp" value="{{ $model->ormawa->no_telp }}">
                    <button type="submit" class="btn btn-info mt-3">Update No Telp</button>

            </form>
        </div>
    </div>
<hr><br>
    
        <div class="card-header">
            <i class="fas fa-edit"></i> <span>Ganti Password Akun</span><br>
            <div class="card-Body mt-4">
                <form action="{{ url('pw/' . $model->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <select name="ormawa_id" id="ormawa_id"
                            class="form-select mb-4 @error('ormawa_id') is-invalid @enderror" style="width: 100%">
                            <option value="{{ $model->ormawa_id }}">{{ $model->ormawa->nm_ormawa }}</option>
                        </select>

                        <input type="hidden" name="username" class="form-control" placeholder="Username" id="username"
                            value="{{ $model->username }}">
                            <input type="text" name="username" class="form-control" placeholder="Username" id="username"
                            value="{{ $model->username }}"disabled><br>
                        <input type="password" name="password"
                            class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Password"
                            id="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="password" name="ulangi-password"
                            class="form-control @error('ulangi-password') is-invalid @enderror"
                            placeholder="ulangi-Password" id="ulangi-password">
                        @error('ulangi-password')
                            <div class="invalid-feedback">
                                {{ 'password tidak sama' }}
                            </div>
                        @enderror
                        <input type="hidden" name="hak_akses" id="hak_askses" value="user">
                        <button type="submit" class="btn btn-info mt-3">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
