@extends('layouts.FHNS.index')
@section('head')
    <center>
        <div class="col-sm-6">
            <h1 class="m-0"><small class="text-center">Daftar Kategori</small></h1>
        </div>
    </center>
@endsection
@section('content')
    <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">Tambah</button> <br>
    <table class="table ">
        <thead class="thead">
            <tr>
                <th style="width: 70%">Nama Kategori</th>
                <th colspan="2" style="width:30%" class="text-center">Aksi</th>
            </tr>
        </thead>
        @foreach ($datas as $key => $value)
            <tr>
                <td>{{ $value->nm_kategori }}</td>
                <td>
                    <center><a class="btn btn-info fas fa-edit" style="width:100px"
                            href="{{ url('kategori/' . $value->id . '/edit') }}"> Edit</a></center>
                </td>
                <td>
                    <form action="{{ url('kategori/' . $value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <center><button class="btn btn-danger far fa-trash-alt" style="width:100px" type="submit" onclick="return confirm('Yakin ingin hapus data?')"> Delete
                            </button></center>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{-- modal tambah --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ url('kategori') }}" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            <input type="Text" name="nm_kategori" class="form-control" placeholder="Nama Kategori"><br>
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
