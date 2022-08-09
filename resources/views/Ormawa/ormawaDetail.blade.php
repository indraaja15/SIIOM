@extends('layouts.FHNS.index')
@section('head')
@endsection
@section('content')
    <div class="card-header">
        <div class="card-body">
            <table class="table table-stripped" id="tampil2">
                <thead class="thead">
                    <tr>
                        <th class="text-center"width="1%">No</th>
                        <th class=""width="30%">Nama Organisasi Mahasiswa</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                @foreach ($datas as $key => $value)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>{{ $value->nm_ormawa }}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </table>
        </div>
    </div>
@endsection
