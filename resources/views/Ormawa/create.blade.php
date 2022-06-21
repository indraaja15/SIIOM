@extends('layouts.FHNS.index')

@section('content')
<form action="{{ url('ormawa') }}" method="post">
    <div class="form-group">
        @csrf
        Nama Organisasi Mahasiswa <input type="Text" name="nm_ormawa" class="form-control"><br>
        <button type="submit">Simpan</button>
    </div>
</form>
@endsection