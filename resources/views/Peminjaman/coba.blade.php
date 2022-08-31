@php
$a = -1;
@foreach ($penyerahan as $p)
@foreach ($brg as $b)
    @if ($b->id == $p->barang_id)      
            $a++;
            // $barang[a] = $_POST ['barang_id'.$a];
    @endif
@endforeach
$barang = $_POST ['barang_id'.$a];
@for ($i = 0; $i < $p->qty; $i++)
$kode_barang = $_POST['kode_barang'.$a.$i];
$q = "insert into detail_peminjaman value $barang, $peminjaman, $kode_barang";
@endfor
@endforeach
@endphp