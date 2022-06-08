@extends('layouts.index')

@section('content')
    <a href="{{ url('barang/create') }}" class="btn btn-info md-4">Tambah Barang</a>
    <br>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Organisasi</th>
                <th>Qty</th>
                <th>Foto</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        @foreach ($data_barang as $key => $value)
            <tr>
                <td>{{ $value->nm_barang }}</td>
                <td>{{ $value->kategori->nm_kategori }}</td>
                <td>{{ $value->ormawa->nm_ormawa }}</td>
                <td>{{ $value->qty }}</td>
                <td width="30%">
                    <img src="{{ asset('img/' . $value->foto) }}" alt="" srcset="" width="30%" height="30%">
                </td>
                <td><a class="btn btn-info" href="{{ url('barang/' . $value->id . '/edit') }}">Update</a></td>
                <td>
                    <form action="{{ url('barang/' . $value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
