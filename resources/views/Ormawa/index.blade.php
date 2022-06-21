@extends('layouts.FHNS.index')

@section('content')
    <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">Tambah</button>
        <br>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th style="width: 70%">Nama Organisasi Mahasiswa</th>
                <th colspan="2" style="width: 30%" class="text-center">Aksi</th>
            </tr>
        </thead>
        @foreach ($datas as $key => $value)
            <tr>
                <td>{{ $value->nm_ormawa }}</td>
                <td>
                    <center><a class="btn btn-info fas fa-edit" style="width:100px"
                            href="{{ url('ormawa/' . $value->id . '/edit') }}"> Edit</a></center>
                </td>
                <td>
                    <form action="{{ url('ormawa/' . $value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <center> <button style="width:100px" class="btn btn-danger far fa-trash-alt" type="submit" onclick="return confirm('Yakin ingin hapus data?')"> Delete
                            </button></center>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ url('ormawa') }}" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            <input type="Text" name="nm_ormawa" class="form-control"
                                placeholder="Nama Organisasi Mahasiswa"><br>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
