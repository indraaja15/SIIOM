@extends('layouts.index')

@section('content')
<form action="{{ url('ormawa/'.$model->id) }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="hidden"  name="_method" value="PATCH">
        Nama Organisasi Mahasiswa : <input type="Text" name="nm_ormawa" value="{{ $model->nm_ormawa }}" class="form-control"><br>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection