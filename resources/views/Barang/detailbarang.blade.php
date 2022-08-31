@extends('layouts.FHNS.index')
@section('head')
    <div class="col-sm-6">
        <h1 class="m-0">Semua barang</h1>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                {{-- <div class="card"> --}}
                <div class="card-body">
                    <div class="row">
                        @foreach ($data_barang as $key => $value)
                            <div class="col-lg-3 col-6">
                                <div class="card p-2">
                                    <img src="{{ asset('img/' . $value->foto) }}" alt="image" class="card-img"
                                        height="180">
                                    <p class="card-text text-center">{{ $value->nm_barang }} <br>
                                    </p>
                                    <p class="card-text text-center">{{ $value->ormawa->nm_ormawa }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>
@endsection
