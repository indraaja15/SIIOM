@extends('layouts.FHNS.index')

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $barang }}</h3>
                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-box2"></i>
                    </div>
                    <a href="Barang.detailbarang" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $corma }}<sup style="font-size: 20px"></sup></h3>

                        <p>Organisasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="Ormawa.ormawaDetail" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $userc }}</h3>

                        <p>User Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <center>
                        <i class="far fa-eye-slash"></i>
                    </center>
                </div>
            </div>

        </div>
    </div>

    @auth
        @if (auth()->user()->hak_akses == 'user')
            <div class="card-header">
               <i class="bi bi-clock-history"></i> <span >Peminjaman Aktif</span>
                <div class="card-body">
                    <table class="table table-stripped" id="tampil2">
                        <thead class="thead">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Nama Peminjam</th>
                                <th style="width: 20%">Nama Barang</th>
                                <th style="width: 15%">Meminjam Dari</th>
                                <th style="width: 15%">Tanggal Pengembalian</th>
                                <th style="width: 5%">Qty</th>
                                <th style="width: 10%" class="text-center">Status</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($peminjaman as $p)
                            @if (auth()->user()->ormawa_id == $p->user->ormawa_id)
                                @if ($p->status == 'Diserahkan')
                                    <tr>
                                        <td>{{ $nomor }}</td>
                                        <td>{{ $p->nm_peminjam }}</td>
                                        <td>
                                            @foreach ($p->barang as $b)
                                                <li>{{ $b->nm_barang }}</li>
                                            @endforeach
                                        </td>
                                        @foreach ($orm as $o)
                                            @if ($b->ormawa_id == $o->id)
                                                <td>{{ $o->nm_ormawa }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $p->tgl_pengembalian }}</td>
                                        <td>
                                            @foreach ($dp as $d)
                                                @if ($d->peminjaman_id == $p->id)
                                                    <li>{{ $d->qty }}</li>
                                                @endif
                                            @endforeach
                                        </td>
                                        @if ($p->status == 'Diserahkan')
                                            <td><span class="badge badge-light text-warning">Telah Menerima Barang</span>
                                            </td>
                                        @endif
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-warning  fas fa-plus-square mb-4"
                                                    data-toggle="modal" data-target="#kembali{{ $p->id }}">Upload
                                                    Pengembalian</button>
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
            {{-- @foreach ($dp as $key => $value)
                        @if (auth()->user()->ormawa_id == $value->peminjaman->user->ormawa_id)
                            @if ($value->peminjaman->status == 'Diserahkan')
                                <tr>
                                    <td>{{ $nomor }}</td>
                                    <td>{{ $value->peminjaman->nm_peminjam }}</td>
                                    <td>{{ $value->barang->nm_barang }}</td>
                                    <td>{{ $value->barang->ormawa->nm_ormawa }}</td>
                                    <td>{{ $value->peminjaman->tgl_pengembalian }}</td>
                                    <td class="text-center">{{ $value->qty }}</td>
                                    @if ($value->peminjaman->status == 'Diserahkan')
                                        <td><span class="badge badge-light text-warning">Telah Menerima Barang</span></td>
                                    @endif
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-warning  fas fa-plus-square mb-4"
                                        data-toggle="modal" data-target="#kembali{{ $value->peminjaman_id }}">Upload
                                        Pengembalian</button>
                                        </center>
                                    </td>
                                </tr>
                                @php
                                    $nomor++;
                                @endphp
                            @endif
                        @endif
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true" id="kembali{{ $value->peminjaman_id }}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{ url('kembali/' . $value->peminjaman_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <label for="">Upload Foto Pengembalian</label>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="BaPengembalian" type="file" id="formFile"
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
        @endif
    @endauth
@endsection
