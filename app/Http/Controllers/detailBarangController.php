<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ormawa;
use App\Models\user;
use App\Models\detail_barang;
use DB;

class detailBarangController extends Controller
{
    public function index($id)
    {
        $idbarang = $id;
        $barang = Barang::with('kategori', 'ormawa')->find($id);
        $dBarang = detail_barang::with('barang')->get();
        return view('detail.index', compact(
            'barang',
            'dBarang',
            'idbarang'
        ));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            
            
          ]);
          $dbarang = new detail_barang;
          $dbarang->barang_id = $request->barang_id;
          $dbarang->tgl_beli = $request->tgl_beli;
          $dbarang->status = $request->status;
          $dbarang->ket = $request->ket;
        
          if ($dbarang->save()) {
            return redirect('detail/'.$request->barang_id)->with('success','Detail Barang Berhasil Ditambah !');
            
          }else{
          
          return back;
          }
    }
    public function edit($id)
    {
        // $dBarang = DB::table('detail_barang')->where('kode_brg',$id)->get();
        $dBarang = detail_barang::with('barang')->find($id);
        return view('detail.update', compact(
            'dBarang'
        ));
    }
}
