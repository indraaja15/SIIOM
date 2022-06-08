@extends('layouts.index')

@section('content')
<form action="{{ url('kategori') }}" method="post">
    <div class="form-group">
        @csrf
        Nama Kategori <input type="Text" name="nm_kategori" class="form-control"><br>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection