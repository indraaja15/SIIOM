@extends('layouts.FHNS.index')

@section('content')
<form action="{{ url('barang/'.$model->id) }}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            @csrf
            <input type="hidden"  name="_method" value="PATCH">
            <input type="hidden" name="oldImage" value="{{ $model->foto }}">
            <input type="Text" name="nm_barang" class="form-control" placeholder="Nama Barang" value="{{ $model->nm_barang }}"><br>
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
                <select name="ormawa_id" id="ormawa_id" class="form-select" style="width: 100%">
                    <option disabled value>Pilih Organisasi</option>
                    <option value="{{ $model->ormawa_id }}">{{ $model->ormawa->nm_ormawa }}</option>
                    @foreach ($orm as $item)
                        <option value="{{ $item->id }}">{{ $item->nm_ormawa }}</option>
                    @endforeach
                </select>
            </div>
            <input type="Text" name="qty" class="form-control" placeholder="Qty" id="qty" value="{{ $model->qty }}"><br>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="foto" name="foto">
                <label class="input-group-text" for="foto">Upload</label>
            </div>
            <img src="{{ asset('img/' . $model->foto) }}" alt="" srcset="" width="30%" height="30%">
            <div class="input-group mt-3" >
                <button type="submit">Simpan</button>
            </div>
            
        </div>
    </form>
@endsection
