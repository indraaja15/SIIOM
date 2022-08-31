@extends('layouts.FHNS.index')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
    </div>

    @auth
        @if (auth()->user()->hak_akses == 'user')
            <div class="card-header">
               <i class="bi bi-clock-history"></i> <span >Validasi Pengembalian</span>
                <div class="card-body">
                    <table class="table table-stripped" id="tampil2">
                        <thead class="thead">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Nama Peminjam</th>
                                <th style="width: 20%">Nama Barang</th>
                                <th style="width: 15%">Tanggal Peminjaman</th>
                                <th style="width: 15%">Tanggal Pengembalian</th>
                                <th style="width: 5%">Qty</th>
                                <th >Bukti Pengembalian</th>
                                
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($peminjaman as $p)
                            @if (auth()->user()->ormawa_id == $p->dari)
                                @if ($p->status == 'Menunggu Validasi')
                                    <tr>
                                        <td>{{ $nomor }}</td>
                                        <td>{{ $p->nm_peminjam }}</td>
                                        <td>
                                            @foreach ($p->barang as $b)
                                                <li>{{ $b->nm_barang }}</li>
                                            @endforeach
                                        </td>
                                        <td>{{ $p->tgl_peminjaman }}</td>
                                        <td>{{ $p->tgl_pengembalian }}</td>
                                        <td>
                                            @foreach ($dp as $d)
                                                @if ($d->peminjaman_id == $p->id)
                                                    <li>{{ $d->qty }}</li>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><a style="width: 170px" class="btn btn-warning fas fa-eye"
                                            href="{{ asset('pengembalian/' . $p->BaPengembalian) }}" target="_blank">
                                            Bukti Pengembalian
                                        </a></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-success mb-2 bi bi-file-earmark-check" style="width:170px"
                                                href="{{ url('validasi/' . $p->id) }}"> Setujui</a>
                                            </center>
                                        </td>
                                    </tr>


                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel" aria-hidden="true" id="kembali{{ $p->id }}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form action="{{ url('kembali/' . $p->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            @csrf
                                                            <div class="input-group mb-3">
                                                                <label for="">Upload Foto Pengembalian</label>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input class="form-control" name="BaPengembalian" type="file"
                                                                    id="formFile" placeholder="Foto Barang">
                                                            </div>
                                                            <button type="submit" class="btn btn-info">Upload</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        @php
                                            $nomor++;
                                        @endphp
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
    @endauth
@endsection
