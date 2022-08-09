@extends('layouts.FHNS.index')
@section('head')
    <center>
        <h1 class="m-0"><small class="text-center">Data Peminjaman</small></h1>
    </center>
@endsection
@section('content')
<div class="container">
    <div class="card-header">
        
        <div class="card-body">
            <table class="table table-stripped" id="printp">
                <thead class="thead">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 15%">Nama Peminjam</th>
                        <th style="width: 20%">Nama Barang</th>
                        <th style="width: 15%">Tanggal Peminjaman</th>
                        <th style="width: 15%">Tanggal Pengembalian</th>
                        <th style="width: 5%">Qty</th>
                        <th style="width: 10%" class="text-center">Status</th>
                        <th style="width: 20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                @php
                    $nomor = 1;
                @endphp
                {{-- test --}}
                @foreach ($peminjaman as $p)
                    @if (auth()->user()->ormawa_id == $p->user->ormawa_id)
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
                                        <li> {{ $d->qty }}</li>
                                    @endif
                                @endforeach
                            </td>

                            @if ($p->status == 'Dikonfirmasi')
                                <td><span class="badge badge-success">{{ $p->status }}</span></td>
                                <td>
                                    <center>
                                        <button class="btn btn-info" disabled>Menunggu Pengambilan</button>
                                    </center>
                                </td>
                            @elseif ($p->status == 'Diserahkan')
                                <td><span class="badge badge-success text-light">Telah Menerima Barang</span></td>
                                <td>
                                    <center>
                                        <a class="btn btn-info fas fa-eye"
                                            href="{{ asset('penyerahan/' . $p->BaPeminjaman) }}" target="_blank">
                                            Lihat Bukti
                                        </a>
                                    </center>
                                </td>
                            @elseif ($p->status == 'Dikembalikan')
                                <td><span class="badge badge-light text-warning">Telah Mengembalikan Barang</span></td>
                                <td>
                                    <center>
                                        <a style="width: 170px" class="btn btn-info fas fa-eye mb-2"
                                            href="{{ asset('penyerahan/' . $p->BaPeminjaman) }}" target="_blank">
                                            Bukti Penyerahan
                                        </a>
                                        <a style="width: 170px" class="btn btn-warning fas fa-eye"
                                            href="{{ asset('pengembalian/' . $p->BaPengembalian) }}" target="_blank">
                                            Bukti Pengembalian
                                        </a>
                                    </center>
                                </td>
                            @else
                                <td><span class="badge badge-warning">{{ $p->status }}</span></td>
                                <td><button class="btn btn-info" disabled>Menunggu Konfirmasi</button></td>
                            @endif
                        </tr>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true" id="serah{{ $p->id }}">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{ url('surat/' . $p->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <label for="">Upload Surat Pengajuan</label>
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control" name="BaPeminjaman" type="file"
                                                        id="formFile" placeholder="Foto Barang">
                                                </div>
                                                <button type="submit" class="btn btn-info">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @php
                            $nomor++;
                        @endphp
                    @endif
                @endforeach

                {{-- endtest --}}


                {{-- Asli --}}
                {{-- @foreach ($dp as $key => $value)
            @if (auth()->user()->ormawa_id == $p->user->ormawa_id)
                        <tr>
                            <td>{{ $nomor }}</td>
                            <td>{{ $p->nm_peminjam }}</td>
                            <td>{{ $value->barang->nm_barang }}</td>
                            <td>{{ $p->tgl_peminjaman }}</td>
                            <td>{{ $p->tgl_pengembalian }}</td>
                            <td class="text-center">{{ $value->qty }}</td>
                            @if ($p->status == 'Dikonfirmasi')
                                <td><span class="badge badge-success">{{ $p->status }}</span></td>
                                <td><button class="btn btn-info" disabled>Menunggu Pengambilan</button></td>
                            @elseif ($p->status == 'Diserahkan')
                                <td><span class="badge badge-success text-light">Telah Menerima Barang</span></td>
                                <td>
                                    <center>
                                        <a class="btn btn-info fas fa-eye"
                                            href="{{ asset('penyerahan/' . $p->BaPeminjaman) }}"
                                            target="_blank">
                                            Lihat Bukti
                                        </a>
                                    </center>
                                </td>
                            @elseif ($p->status == 'Dikembalikan')
                                <td><span class="badge badge-light text-warning">Telah Mengembalikan Barang</span></td>
                                <td>
                                    <center>
                                        <a style="width: 170px" class="btn btn-info fas fa-eye mb-2" 
                                            href="{{ asset('penyerahan/' . $p->BaPeminjaman) }}"
                                            target="_blank" >
                                            Bukti Penyerahan
                                        </a>
                                        <a style="width: 170px" class="btn btn-warning fas fa-eye"
                                            href="{{ asset('pengembalian/' . $p->BaPengembalian) }}"
                                            target="_blank">
                                            Bukti Pengembalian
                                        </a>
                                    </center>
                                </td>
                            @else
                                <td><span class="badge badge-warning">{{ $p->status }}</span></td>
                                <td><button class="btn btn-info" disabled>Menunggu Konfirmasi</button></td>
                            @endif
                        </tr>
                        @php
                            $nomor++;
                        @endphp
                @endif
            @endforeach --}}
            </table>
        </div>
    </div>
    </div>
@endsection
