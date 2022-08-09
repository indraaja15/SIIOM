@extends('layouts.FHNS.index')

@section('content')
    <div class="container-fluid">
        <div class="card-header">
            <i class="fas fa-edit"></i> <span>Update Data Kategori</span><br>
            <div class="card-Body">
                <form action="{{ url('kategori/' . $model->id) }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <label for="bn_kategori" class="mt-4">Nama kategori</label>
                         <input type="Text" name="nm_kategori" value="{{ $model->nm_kategori }}"
                            class="form-control"><br>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
