@extends('layouts.FHNS.index')
@section('head')
<center>
    <h1 class="m-0"><small class="text-center">Detail Barang  {{ $barang->nm_barang }}</small></h1>
</center>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="card-header">
            <button type="button" class="btn btn-info  fas fa-plus-square mb-2 ml-3" data-toggle="modal"
                data-target=".bd-example-modal-lg"> Tambah</button>
            <div class="card-body">
                <table class="table table-stripped" id="printb">
                    <thead class="thead">
                        <tr>
                            <th class="text-center"width="1%">No</th>
                            <th class="">Kode Barang</th>
                            <th class="text-center"style="width: 10%">Kualitas</th>
                            <th class="text-center">Tgl Pembelian</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center"> Aksi</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($dBarang as $db )
                    @if ($db->barang_id == $idbarang)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>KDB-{{ date('Y', strtotime($db->tgl_beli)) }}{{ $db->barang->id }}{{ $db->barang->ormawa_id }}-00{{ $db->kode_brg }}</td>
                        @if ($db->status == '1')
                            <td><span class="badge badge-success text-light" style="width: 90px">Baik</span></td>
                        @elseif ($db->status == '2')
                            <td><span class="badge badge-warning text-light"style="width: 90px">Cukup Baik</span>
                            </td>
                        @else
                            <td><span class="badge badge-danger text-light"style="width: 90px">Kurang Baik</span>
                            </td>
                        @endif
                        <td class="text-center">{{ date('d-M-Y', strtotime($db->tgl_beli)) }}</td>
                        <td class="text-center"><small>{{ $db->ket }}</small></td>
                        <td>
                            <center><a class="btn btn-info fas fa-edit " style="width:100px"
                                href="{{ url('detail/' . $db->kode_brg . '/edit') }}"> Edit</a></center>
                                
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
                    <form action="/detail" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <label for="" class="mt-2">Nama Barang</label>
                            <input type="hidden" name="barang_id" id="barang_id" class="form-control" value="{{ $barang->id }}">
                            <input type="text" name="tampil" id="tampil" class="form-control" readonly value="{{ $barang->nm_barang }}">
                            <label for="" class="mt-2">Tanggal Pembelian</label>
                            <input type="date" name="tgl_beli" class="form-control mb-3" placeholder="Tanggal Pembelian" value="{{ old('tgl_beli') }}"required>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" id="ket" rows="3" name="ket"></textarea>
                              </div>
                            <input type="radio" name="status" id="status1" value="1">
                            <label for="status1" class="mr-2">Baik</label>
                            <input type="radio" name="status" id="status2" value="2">
                            <label for="status2" class="mr-2">Cukup Baik</label>
                            <input type="radio" name="status" id="status3" value="3">
                            <label for="status3" class="mr-2">Kurang Baik</label>
                            <br>
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}"><br>
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
