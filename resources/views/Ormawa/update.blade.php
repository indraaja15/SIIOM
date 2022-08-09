@extends('layouts.FHNS.index')
@section('head')
    <center>
            <h1 class="m-0"><small class="text-center">Ubah Organisasi Mahasiswa</small></h1>
    </center>
@endsection
@section('content')
<div class="container-fluid">
<form action="{{ url('ormawa/'.$model->id) }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="hidden"  name="_method" value="PATCH">
        <input type="Text" name="nm_ormawa" value="{{ $model->nm_ormawa }}" class="form-control"><br>
        <button type="submit" class="btn btn-info">Simpan perubahan</button>
    </div>
</form>
</div>
@endsection