@extends('layouts.FHNS.index')

@section('content')
<form action="{{ url('kategori/'.$model->id) }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="hidden"  name="_method" value="PATCH">
        Nama Kategori : <input type="Text" name="nm_kategori" value="{{ $model->nm_kategori }}" class="form-control"><br>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection