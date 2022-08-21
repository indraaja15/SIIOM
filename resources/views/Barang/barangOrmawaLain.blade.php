@extends('layouts.FHNS.index')
@section('head')
    @foreach ($orm as $item)
        @if ($item->id == $idormawa)
            <center>
                <h1 class="m-0"><small class="text-center">Daftar Barang Organisasi {{ $item->nm_ormawa }}</small></h1>
            </center>
        @endif
    @endforeach
@endsection
@section('content')
    <div class="card-header">
        <div class="card-body">
            <table class="table table-stripped" id="tampil2">
                <thead class="thead">
                    <tr>
                        <th class="text-center" width="1%">No</th>
                        <th class=""width="30%">Nama Barang</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Status</th>
                        <th class=" text-center">Qty</th>

                    </tr>
                </thead>@php
                    $i = 1;
                @endphp
                @foreach ($brg as $key => $value)
                    @if ($value->ormawa_id == $idormawa)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $value->nm_barang }}</td>
                            <td class="text-center">{{ $value->kategori->nm_kategori }}</td>
                            @if ($value->status == '1')
                                    <td><center><span class="badge badge-success text-light" style="width: 90px">Baik</span><center></td>
                                @elseif ($value->status == '2')
                                    <td><center><span class="badge badge-warning text-light"style="width: 90px">CUkup Baik</span></center>
                                    </td>
                                @else
                                    <td><center><span class="badge badge-danger text-light"style="width: 90px">Kurang Baik</span></center>
                                    </td>
                                @endif
                            <td class="text-center">{{ $value->qty }}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @else
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection
