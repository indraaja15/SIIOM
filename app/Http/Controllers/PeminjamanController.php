<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\peminjaman;
use App\Models\detailPeminjaman;
use App\Models\barang_peminjaman;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $peminjaman = peminjaman::with('user')->orderBy('id','desc')->get();
        $brg = Barang::all();
        $dp = barang_peminjaman::all();
        return view('Peminjaman.index', compact(
            'user',
            'brg',
            'peminjaman',
            'dp'
        ));
    }
    public function konfirmasi()
    {
        $user = User::with('ormawa')->paginate(10);
        $peminjaman = peminjaman::with('user','barang')->orderBy('id','desc')->get();
        $brg = Barang::all();
        $orm = Ormawa::all();
        $dp = barang_peminjaman::all();
        return view('Peminjaman.konfirmasi', compact(
            'user',
            'orm',
            'brg',
            'peminjaman',
            'dp'
        ));
    }

    public function pilihormawa()
    {
        $user = User::with('ormawa');
        $datas = Ormawa::all();
        return view('Peminjaman.pilihormawa', compact(
            'datas',
            'user'
        ));
    }
    public function pilih($id)
    {
        $idormawa = $id;
        $brg = Barang::all();
        $peminjaman = new peminjaman;
        return view('Peminjaman.create', compact(
            'brg',
            'idormawa',
            'peminjaman'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brg = Barang::all();
        $peminjaman = new peminjaman;
        return view('Peminjaman.create', compact(
            'brg',
            'peminjaman'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->suratPengajuan;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
        $nm->move(public_path() . '/pengajuan', $nmFile);
        $brg = $request->brg;
        $data = array(
            'user_id' => $request->user_id,
            'nm_peminjam' => $request->nm_peminjam,
            'no_telp' => $request->no_telp,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status' => "Menunggu",
            'BaPeminjaman' => $request->BaPeminjaman,
            'BaPengembalian' => $request->BaPengembalian,
            'suratPengajuan' => $nmFile
        
        );
        $lastIDP =DB::table('peminjamen')->insertGetId($data,);
        
        
        for($i=1; $i < $brg; $i++) { 
            $detail = new barang_peminjaman;
            $detail->barang_id =$request['barang_id'.$i];
            $detail->peminjaman_id =$lastIDP;
            $detail->qty = $request['qty'.$i];
            if ($detail->barang_id) {
                
                $detail->save();
            }
        }
        
        // $detail->barang_id =$request->barang_id1;
        // $detail->peminjaman_id =$lastIDP;
        // $detail->qty = '1';
        // $detail->save();

        return redirect('peminjaman');
        // dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function ubah($id)
    {
        $model = peminjaman::find($id);
        $model->status = "Dikonfirmasi";
            $model->update();
            return redirect('konfirmasi');
        ;
    }
    public function tolak($id)
    {
        $model = peminjaman::find($id);
        $model->status = "Ditolak";
            $model->update();
            return redirect('konfirmasi');
        ;
    }
    public function serah(Request $request,$id)
    {
        $idpeminjaman =$id;

        $idbarang =DB::table('barang_peminjaman')
        ->where('peminjaman_id',$id)
        ->get();

        foreach ($idbarang as $key => $value) {
            $qtybarang = DB::table('barang')->where('id',$value->barang_id)->get();
            foreach($qtybarang as $qty){
                $qtypeminjaman =$value->qty ;
                $qtyawal = $qty->qty;
                $akhir = $qtyawal - $qtypeminjaman;
                $proses = barang::find($value->barang_id);
                $proses->qty = $akhir;
                $proses->update();
            }
        }
       
        
        $model = peminjaman::find($id);
        $nm = $request->BaPeminjaman;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

        $model->status = "Diserahkan";
        $model->BaPeminjaman = $nmFile;

        $nm->move(public_path() . '/penyerahan', $nmFile);

            $model->save();
            return redirect('konfirmasi');
        ;
    }
    public function kembali(Request $request,$id)
    {
        $idpeminjaman =$id;

        $idbarang =DB::table('barang_peminjaman')
        ->where('peminjaman_id',$id)
        ->get();

        foreach ($idbarang as $key => $value) {
            $qtybarang = DB::table('barang')->where('id',$value->barang_id)->get();
            foreach($qtybarang as $qty){
                $qtypeminjaman =$value->qty ;
                $qtyawal = $qty->qty;
                $akhir = $qtyawal + $qtypeminjaman;
                $proses = barang::find($value->barang_id);
                $proses->qty = $akhir;
                $proses->update();
            }
        }
        $model = peminjaman::find($id);
        $nm = $request->BaPengembalian;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

        $model->status = "Dikembalikan";
        $model->BaPengembalian = $nmFile;

        $nm->move(public_path() . '/pengembalian', $nmFile);

            $model->save();
            return redirect('/');
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dp = detailPeminjaman::find($id);
       $dp ->delete();
       return redirect('peminjaman');
    }
}
