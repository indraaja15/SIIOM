@extends('layouts.FHNS.index')

@section('content')
    <button type="button" class="btn btn-info  fas fa-plus-square mb-4" data-toggle="modal"
        data-target=".bd-example-modal-lg">Tambah</button>

    <br>
    <table class="table table-striped">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th class="text-center">Nama Barang</th>
                <th>Kategori</th>
                <th>Organisasi</th>
                <th>Qty</th>
                <th class="text-center">Foto</th>
                <th colspan="2" class="text-center">Aksi</th>
            </tr>
        </thead>
        @foreach ($data_barang as $key => $value)
            @php
                $i = 1;
            @endphp
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $value->nm_barang }}</td>
                <td>{{ $value->kategori->nm_kategori }}</td>
                <td>{{ $value->ormawa->nm_ormawa }}</td>
                <td class="text-center">{{ $value->qty }}</td>
                <td width="130px" class="text-center">
                    <img src="{{ asset('img/' . $value->foto) }}" alt="" srcset="" width="100%" height="100%">
                </td>
                <td>
                    <center><a style="width:100px" class="btn btn-info fas fa-edit"
                            href="{{ url('barang/' . $value->id . '/edit') }}"> Edit</a></center>
                </td>
                <td>
                    <form method="POST" action="{{ url('barang/' . $value->id) }}">
                        @method('delete')
                        @csrf
                        <center>
                            <button style="width: 100px" class="btn btn-danger far fa-trash-alt " type="submit" onclick="return confirm('Yakin ingin hapus data?')">Delete</button>
                        </center>
                    </form>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
    {{-- modal view --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
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
                        <button type="submit" class="btn btn-info ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal notif delete --}}
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
