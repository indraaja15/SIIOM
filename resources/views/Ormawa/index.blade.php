@extends('layouts.index')

@section('content')
    <a href="{{ url('ormawa/create') }}" class="btn btn-info md-4">Tambah Ormawa</a>
    <br>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>Nama Organisasi Mahasiswa</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        @foreach ($datas as $key => $value)
            <tr>
                <td>{{ $value->nm_ormawa }}</td>
                <td><a class="btn btn-info" href="{{ url('ormawa/'.$value->id.'/edit') }}">Update</a></td>
                <td>
                    <form action="{{ url('ormawa/'.$value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
