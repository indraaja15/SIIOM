@extends('layouts.FHNS.index')

@section('content')
    <form action="{{ url('barang') }}" method="post" enctype="multipart/form-data">
        <div class="card-body">
            @csrf
            <input type="Text" name="nm_barang" class="form-control" placeholder="Nama Barang"><br>
            <div class="form-group mb-4">
                <select name="kategori_id" id="kategori_id" class="form-select" style="width: 100%">
                    <option value=''>Pilih Kategori</option>
                    @foreach ($kat as $item)
                        <option value="{{ $item->id }}">{{ $item->nm_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <select name="ormawa_id" id="ormawa_id" class="form-select" style="width: 100%">
                    <option value=''>Pilih Organisasi</option>
                    @foreach ($orm as $item)
                        <option value="{{ $item->id }}">{{ $item->nm_ormawa }}</option>
                    @endforeach
                </select>
            </div>
            <input type="number" name="qty" class="form-control" placeholder="Qty" id="qty"><br>
            <div class="input-group mb-3">
                <img class="img-preview img-fluid">
                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage">
                <label class="input-group-text" for="foto">Upload</label>
            </div>
            <button type="submit">Simpan</button>
        </div>
    </form>
    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img - preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
