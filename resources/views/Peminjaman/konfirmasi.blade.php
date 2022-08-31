@extends('layouts.FHNS.index')
@section('head')
@if (auth()->user()->hak_akses == 'user')
<center>
    <h1 class="m-0"><small class="text-center">Persetujuan Peminjaman</small></h1>
</center>
@else
<center>
    <h1 class="m-0"><small class="text-center">Barang Dipinjam</small></h1>
</center>

@endif
    
@endsection
@section('content')
    <div class="container">
        <div class="card-head">
            <div class="card-body">
                <table class="table " id="printk">
                    <thead class="thead">
                        <tr>
                            <th class="text-center"style="width: 1%">No</th>
                            <th>Dari Ormawa</th>
                            <th >Nama Peminjam</th>
                            <th >No Telp</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center" >Tanggal Peminjaman</th>
                            <th class="text-center" >Tanggal Pengembalian</th>
                            <th style="width: 1%">Qty</th>

                            
                            @if (auth()->user()->hak_akses == 'user')
                            <th class="text-center" >Surat Pengajuan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                            @endif
                            
                        </tr>
                    </thead>
                    @php
                        $nomor = 1;
                    @endphp
                    {{-- new --}}
                    @foreach ($peminjaman as $p)
                        @if (auth()->user()->ormawa_id == $p->dari)
                        @if ($p->status != 'Selesai')

                            <tr>
                                <td>{{ $nomor }}</td>
                                <td>{{ $p->user->ormawa->nm_ormawa }}</td>
                                <td>{{ $p->nm_peminjam }}</td>
                                <td>{{ $p->no_telp }}</td>
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
                                
                                @if (auth()->user()->hak_akses == 'user')
                                <td>
                                    <a class="btn btn-info fas fa-eye" href="{{ asset('pengajuan/' . $p->suratPengajuan) }}"
                                        target="_blank">
                                        Unduh
                                    </a>
                                </td>
                                @if ($p->status == 'Dikonfirmasi')
                                    <td class="text-center"><span class="badge badge-success">{{ $p->status }}</span>
                                    </td>
                                    <td>
                                        <center><a class="btn btn-info fas fa-plus-square" style="width:170px"
                                            href="{{ url('penyerahan/' . $p->id ) }}"> Penyerahan</a></center>
                                        {{-- <center>
                                            <button type="button" class="btn btn-success  fas fa-plus-square mb-4"
                                                data-toggle="modal" data-target="#serah{{ $p->id }}">Upload
                                                Penyerahan</button>
                                        </center> --}}
                                    </td>
                                @elseif ($p->status == 'Diserahkan')
                                    <td class="text-center"><span
                                            class="badge badge-light text-success">{{ $p->status }}</span>
                                    </td>
                                    <td width="130px" class="hilang-print text-center">
                                        <center>
                                            <a class="btn btn-info fas fa-eye" style="width: 170px"
                                                href="{{ asset('penyerahan/' . $p->BaPeminjaman) }}" target="_blank">
                                                Lihat Bukti
                                            </a>
                                        </center>
                                        <center>
                                            <a class="btn btn-info fas fa-eye mt-1" style="width: 170px"
                                                href="{{url('detailPenyerahan/' . $p->id) }}">
                                                Detail Barang
                                            </a>
                                        </center>
                                    </td>
                                @elseif ($p->status == 'Menunggu')
                                    <td class="text-center"><span class="badge badge-warning">{{ $p->status }}</span>
                                    </td>
                                    <td>
                                        <center><a class="btn btn-success mb-2 " style="width:170px"
                                                href="{{ url('konfirmasi/' . $p->id) }}">Setujui</a>
                                            <a class="btn btn-danger " style="width:170px"
                                                href="{{ url('tolak/' . $p->id) }}">Tolak</a>
                                        </center>
                                    </td>
                                @elseif ($p->status == 'Dikembalikan')
                                    <td class="text-center"><span class="badge badge-warning">{{ $p->status }}</span>
                                    </td>
                                    <td width="130px" class="hilang-print text-center">
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
                                @elseif ($p->status == 'Selesai')
                                <td class="text-center"><span class="badge badge-danger">{{ $p->status }}</span>
                                </td>
                                <td>
                                    <center><button class="btn btn-danger" disabled style="width: 170px">Selesai</button>
                                    </center>
                                </td>
                                @else
                                <td class="text-center"><span class="badge badge-danger">{{ $p->status }}</span>
                                </td>
                                <td>
                                    <center><button class="btn btn-danger" disabled style="width: 170px">Tolak</button>
                                    </center>
                                </td>
                                @endif
                            </tr>
                            @php
                                $nomor++;
                            @endphp

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true" id="serah{{ $p->id }}">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form action="{{ url('serah/' . $p->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <label for="">Upload Foto Penyerahan</label>
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
                        @endif
                        @endif
                                                    
                        @endif
                    @endforeach

                    {{-- endNew --}}
                    {{-- old --}}
                    {{-- @foreach ($dp as $key => $value)
                @if (auth()->user()->ormawa_id == $value->barang->ormawa_id && auth()->user()->id != $value->peminjaman->user_id)
                    <tr>
                        <td class="text-center">{{ $nomor }}</td>
                        <td>{{ $value->peminjaman->nm_peminjam }}</td>
                        <td>{{ $value->barang->nm_barang }}</td>
                        <td class="text-center">{{ $value->peminjaman->tgl_peminjaman }}</td>
                        <td class="text-center">{{ $value->peminjaman->tgl_pengembalian }}</td>
                        <td class="text-center">{{ $value->qty }}</td>
                        <td ><a class="btn btn-info fas fa-eye"
                                        href="{{ asset('pengajuan/' . $value->peminjaman->suratPengajuan) }}"
                                        target="_blank">
                                        Unduh Surat
                                    </a></td>
                        @if ($value->peminjaman->status == 'Dikonfirmasi')
                            <td class="text-center"><span
                                    class="badge badge-success">{{ $value->peminjaman->status }}</span>
                            </td>
                            <td>
                                <center>
                                    <button type="button" class="btn btn-success  fas fa-plus-square mb-4"
                                        data-toggle="modal" data-target="#serah{{ $value->peminjaman_id }}">Upload
                                        Penyerahan</button>
                                </center>
                            </td>
                        @elseif ($value->peminjaman->status == 'Diserahkan')
                            <td class="text-center"><span
                                    class="badge badge-light text-success">{{ $value->peminjaman->status }}</span>
                            </td>
                            <td width="130px" class="hilang-print text-center">
                                <center>
                                    <a class="btn btn-info fas fa-eye"
                                        href="{{ asset('penyerahan/' . $value->peminjaman->BaPeminjaman) }}"
                                        target="_blank">
                                        Lihat Bukti
                                    </a>
                                </center>
                            </td>
                        @elseif ($value->peminjaman->status == 'Menunggu')
                            <td class="text-center"><span
                                    class="badge badge-warning">{{ $value->peminjaman->status }}</span>
                            </td>
                            <td>
                                <center><a class="btn btn-success mb-2 " style="width:100px"
                                        href="{{ url('konfirmasi/' . $value->peminjaman_id) }}">Konfirmasi</a>
                                        <a class="btn btn-danger " style="width:100px"
                                        href="{{ url('tolak/' . $value->peminjaman_id) }}">Tolak</a></center>
                            </td>
                        @elseif ($value->peminjaman->status == 'Dikembalikan')
                            <td class="text-center"><span
                                    class="badge badge-warning">{{ $value->peminjaman->status }}</span>
                            </td>
                            <td width="130px" class="hilang-print text-center">
                                <center>
                                    <a style="width: 170px" class="btn btn-info fas fa-eye mb-2"
                                        href="{{ asset('penyerahan/' . $value->peminjaman->BaPeminjaman) }}"
                                        target="_blank">
                                        Bukti Penyerahan
                                    </a>
                                    <a style="width: 170px" class="btn btn-warning fas fa-eye"
                                        href="{{ asset('pengembalian/' . $value->peminjaman->BaPengembalian) }}"
                                        target="_blank">
                                        Bukti Pengembalian
                                    </a>
                                </center>
                            </td>
                        @endif
                    </tr>
                    @php
                        $nomor++;
                    @endphp
                @endif
                
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="serah{{ $value->peminjaman_id }}">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="{{ url('serah/' . $value->peminjaman_id) }}" method="post"
                                enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <label for="">Upload Foto Penyerahan</label>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" name="BaPeminjaman" type="file" id="formFile"
                                                placeholder="Foto Barang">
                                        </div>
                                        <button type="submit" class="btn btn-info">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach --}}
                </table>
            </div>
        </div>
    </div>
@endsection
