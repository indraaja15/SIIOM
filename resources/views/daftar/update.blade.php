@extends('layouts.FHNS.index')

@section('content')

    <div class="container-fluid">
        <div class="card-header">
            <i class="fas fa-edit"></i> <span>Reset Password Ormawa</span><br>
            <div class="card-Body mt-4">
                <form action="{{ url('daftar/' . $model->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <select name="ormawa_id" id="ormawa_id"
                            class="form-select mb-4 @error('ormawa_id') is-invalid @enderror" style="width: 100%">
                            <option disabled value>Pilih Kategori</option>
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
                        <button type="submit" class="btn btn-info mt-3">Simpan</button>

                </form>
            </div>
        </div>
    </div>
@endsection
