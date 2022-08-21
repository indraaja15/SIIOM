@extends('layouts.FHNS.index')
@section('head')
    <center>
        <div class="col-sm-6">
            <h1 class="m-0"><small class="text-center">Daftar Barang Ormawa</small></h1>
        </div>
    </center>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @error('foto')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Size Foto terlalu besar Makasimal 1 mb</strong>
        </div>
    @enderror
    <div class="container">
        <div class="card-header">
            <button type="button" class="btn btn-info  fas fa-plus-square mb-2 ml-3" data-toggle="modal"
                data-target=".bd-example-modal-lg"> Tambah</button>
            <div class="card-body">
                <table class="table table-stripped" id="printb">
                    <thead class="thead">
                        <tr>
                            <th class="text-center"width="1%">No</th>
                            <th class="">Nama Barang</th>
                            <th class="text-center"style="width: 10%">Kualitas</th>
                            <th class="text-center">Kategori</th>
                            <th class=" text-center" style="width: 10%">Qty</th>
                            <th class=" text-center">Foto</th>
                            <th class="text-center"> Aksi</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data_barang as $key => $value)
                        @if (auth()->user()->ormawa_id == $value->ormawa_id)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td>{{ $value->nm_barang }}</td>
                                @if ($value->status == '1')
                                    <td><span class="badge badge-success text-light" style="width: 90px">Baik</span></td>
                                @elseif ($value->status == '2')
                                    <td><span class="badge badge-warning text-light"style="width: 90px">Kurang Baik</span>
                                    </td>
                                @else
                                    <td><span class="badge badge-danger text-light"style="width: 90px">Rusak</span>
                                        <t /d>
                                @endif

                                <td class="text-center">{{ $value->kategori->nm_kategori }}</td>
                                @if ($value->qty != '0')
                                    <td class="text-center">{{ $value->qty }}</td>
                                @else
                                    <td><span class="text-center badge badge-info text-light">Barang Habis Dipinjam</span>
                                    </td>
                                @endif

                                <td width="130px" class="hilang-print text-center">
                                    <img src="{{ asset('img/' . $value->foto) }}" alt="gambar" width="80"
                                        height="80">
                                </td>
                                <td class="hilang-print">
                                    <center><a style="width:100px" class="btn btn-info fas fa-edit mb-2"
                                            href="{{ url('barang/' . $value->id . '/edit') }}"> Edit</a></center>

                                    {{-- <form method="POST" action="{{ url('barang/' . $value->id) }}">
                            @method('delete')
                            @csrf
                            <center>
                                <button style="width: 100px" class="btn btn-danger far fa-trash-alt " type="submit"
                                    onclick="return confirm('Yakin ingin hapus data?')">Delete</button>
                            </center>
                        </form> --}}
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                </table>
            </div>
        </div>

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

                            <input type="number" name="qty" class="form-control" placeholder="Qty" id="qty"><br>
                            <div class="mb-3">
                                <input class="form-control @error('foto') is-invalid @enderror" name="foto"
                                    type="file" id="formFile" placeholder="Foto Barang">
                            </div>
                            <input type="radio" name="status" id="status1" value="1">
                            <label for="status1">Baik</label>
                            <input type="radio" name="status" id="status2" value="2">
                            <label for="status2">Kurang Baik</label>
                            <input type="radio" name="status" id="status3" value="3">
                            <label for="status2">Rusak</label>
                            <br>
                            <input type="hidden" name="ormawa_id" value="{{ auth()->user()->ormawa_id }}"><br>
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
