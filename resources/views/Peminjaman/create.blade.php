@extends('layouts.FHNS.index')
@section('head')
    <center>
        <h1 class="m-0"><small class="text-center">Tambah Peminjaman</small></h1>
    </center>
@endsection
@section('content')
    <div class="container">
        <form action="{{ url('peminjaman') }}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status" value="Menunggu">
                <label for="nm_peminjam">Nama Peminjam</label>
                <input type="Text" name="nm_peminjam" class="form-control" placeholder="Nama Peminjam" required>
                <label for="" class="mt-2">No Telpon</label>
                <input type="Text" name="no_telp" class="form-control mb-2" placeholder="No Telp" required>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 80%">Nama barang</th>
                            <th style="width: 20%">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" id="brg" name="brg" value="2">
                                <select name="barang_id1" id="barang_id1"
                                    class="form-select @error('barang_id1') is-invalid @enderror"
                                    aria-label=".form-select- example" required>
                                    <option value=''>- Pilih Barang -</option>
                                    @foreach ($brg as $item)
                                        @if ($item->ormawa_id == $idormawa)
                                        {{ $qtymax = $item->qty }}
                                            @if ($item->qty !='0')
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nm_barang }}
                                                    @if ($item->status == '1')
                                                        (Baik)
                                                    @elseif ($item->status == '2')
                                                        (Cukup Baik)
                                                    @else
                                                        (Kurang Baik)
                                                    @endif
                                                </option>
                                            @else
                                                <option disabled value="{{ $item->id }}">
                                                    {{ $item->nm_barang }}
                                                    (Stok Habis)
                                                </option>
                                            @endif
                                        @endif
                                        
                                    @endforeach
                                </select>

                                @error('barang_id')
                                    <div class="invalid-feedback">
                                        {{ 'Silahkan Pilih Barang' }}
                                    </div>
                                @enderror
                            </td>
                            <td><input type="number" id="qty1"  name="qty1" class="form-control @error('qty1') is-invalid @enderror" placeholder="Qty" required>
                            </td>@error('qty1')
                            <div class="invalid-feedback">
                                {{ 'hbs' }}
                            </div>
                        @enderror
                            <th class="text-center"><button class="btn btn-info" onclick="tambahBrg();"
                                    style="width:40px">+</button></th>

                        <tr id="trBarang">
                        </tr>
                    </tbody>
                </table>
                <label for="" class="mt-2">Tanggal Peminjaman</label>
                <input type="date" name="tgl_peminjaman" class="form-control" placeholder="Tanggal Peminjaman" required>
                <label for="" class="mt-2">Tanggal Pengembalian</label>
                <input type="date" name="tgl_pengembalian" class="form-control" placeholder="Tanggal Pengembalian"required>
                <label for="" class="mt-2">Surat Pengajuan</label>
                <input type="file" name="suratPengajuan" class="form-control" required>

                <button type="submit" class="btn btn-info mt-3">Simpan</button>
            </div>
        </form>
    </div>
<script>
        function tambahBrg() {
            var brg = document.getElementById("brg").value;
            var barang;
            barang = "<tr id='srow"+brg+"'>" +
                "<td style='width: 80%'>" +
                "<select name='barang_id" + brg + "' id='barang_id" + brg +
                "' class='form-select @error('barang_id"+brg+"') is-invalid @enderror' aria-label='.form-select- example'  required>" +
                "<option value=''>- Pilih Barang -</option>" +
                @foreach ($brg as $item)
                    @if ($item->ormawa_id == $idormawa)
                        @if ($item->qty != '0')
                            "<option value='{{ $item->id }}'>"+
                            "{{ $item->nm_barang }}" +
                            @if ($item->status == '1')
                                "(Baik) " +
                            @elseif($item->status == '2')
                                "(Cukup Baik) " +
                            @else
                                "(Kurang Baik) " +
                            @endif
                            "</option>" +
                        @else
                            "<option disabled value='{{ $item->id }}'>" +
                            "{{ $item->nm_barang }}" +
                            "(Stok Habis)" +
                            "</option>" +
                        @endif
                    @endif
                @endforeach
            "</select>" +
            "</td>" +
            "<td style='width: 20%'><input type='number' id='qty" + brg + "' name='qty" + brg +
                "' class='form-control' placeholder='Qty' required></td>" +
                "<th class='text-center'>" +
                " <button type='button' id='btnhapusbrg" + brg +
                "' style='width: 40px' class='btn btn-danger ' onclick='hapusbrg(\"#srow" + brg +"\"); return false;'>-</button>" +
                "</th>" +
                "</tr>"
            $("#trBarang").append(barang);
            brg = (brg - 1) + 2;
            document.getElementById("brg").value = brg;
        }

        function hapusbrg(brg){
            $(brg).remove();
        }
    </script>
@endsection