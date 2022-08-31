@extends('layouts.FHNS.index')

@section('content')
@error('foto')
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Size Foto terlalu besar Makasimal 1 mb</strong>
</div>
@enderror
<div class="container-fluid">
    <div class="card-header">
        <i class="fas fa-edit"></i> <span>Update Data Barang</span><br>
    <div class="card-Body">
        <form action="{{ url('barang/' . $model->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="oldImage" value="{{ $model->foto }}">
                <label for="" class="mt-4">Nama Barang</label>
                <input type="Text" name="nm_barang" class="form-control " placeholder="Nama Barang"
                    value="{{ $model->nm_barang }}"><br>
                    <label for="">Kategori</label>
                <div class="form-group mb-4">
                    <select name="kategori_id" id="kategori_id" class="form-select" style="width: 100%">
                        <option disabled value>Pilih Kategori</option>
                        <option value="{{ $model->kategori_id }}">{{ $model->kategori->nm_kategori }}</option>
                        @foreach ($kat as $item)
                            <option value="{{ $item->id }}">{{ $item->nm_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <input type="hidden" name="ormawa_id" id="ormawa_id" value="{{ $model->ormawa_id }}">
                   
                </div>
                <label for="">Dapat Dipinjam</label>
                <input type="Text" name="qty" class="form-control" placeholder="Qty" id="qty"
                    value="{{ $model->qty }}"><br>
                    <label for="">Foto</label>
                <div class="input-group mb-3">
                    
                    <input class="form-control @error('foto') is-invalid @enderror" name="foto"type="file" id="foto" placeholder="Foto Barang" >
                </div>
                <input type="hidden" name="status" id="status" value="1">
                <img src="{{ asset('img/' . $model->foto) }}" alt="" srcset="" width="170px" height="170px">
                <div class="input-group mt-3">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>

            </div>
        </form>
    </div>
    </div>
    </div>
@endsection
