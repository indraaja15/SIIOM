@extends('layouts.FHNS.index')
@section('head')
    <div class="col-sm-6">
        <h1 class="m-0"><small class="text-center">Daftar Kategori</small></h1>
    </div>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @error('nm_kategori')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Nama Kategori Sudah Terdaftar </strong>
        </div>
    @enderror
    <div class="container">
        <div class="card-header">
            <div class="card-body">
                <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
                    data-target=".bd-example-modal-lg">Tambah</button>

                <br>
                <table class="table table-stripped" id="tampil2">
                    <thead class="thead">
                        <tr>
                            <th style="width: 10%" class="text-center">No</th>
                            <th style="width: 70%">Nama Kategori</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    @php
                        $nomor = 1;
                    @endphp
                    <tbody>
                        @foreach ($datas as $key => $value)
                            <tr>
                                <td class="text-center">{{ $nomor }}</td>
                                <td>{{ $value->nm_kategori }}</td>
                                <td>
                                    <center><a class="btn btn-info fas fa-edit " style="width:100px"
                                            href="{{ url('kategori/' . $value->id . '/edit') }}"> Edit</a></center>

                                    {{-- <form action="{{ url('kategori/' . $value->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <center><button class="btn btn-danger far fa-trash-alt" style="width:100px" type="submit"
                                    onclick="return confirm('Yakin ingin hapus data?')"> Delete
                                </button></center>
                        </form> --}}
                                </td>
                            </tr>
                            @php
                                $nomor++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal tambah --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ url('kategori') }}" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            @csrf
                            <input type="Text" name="nm_kategori"
                                class="form-control @error('nm_kategori') is-invalid @enderror"
                                placeholder="Nama Kategori"><br>
                            <button type="submit"
                                class="btn btn-info @error('simpan') is-invalid @enderror">Simpan</button>

                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
