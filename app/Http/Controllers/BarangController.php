<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('Ormawa');
        $kat = Kategori::orderBy('nm_kategori','ASC')->get();
        $orm = Ormawa::all();
        $data_barang = Barang::with('Kategori', 'Ormawa')->orderBy('nm_barang','ASC')->get();
        return view('Barang.index', compact(
            'data_barang',
            'kat',
            'user',
            'orm'
        ));
    }
    public function ormawaLain()
    {
        $datas = Ormawa::orderBy('nm_ormawa','asc')->get();
        return view('Barang.pilihOrmawa', compact(
            'datas'
        ));
    }
    public function cek($id)
    {
        $idormawa = $id;
        $brg = Barang::with('ormawa')->get();
        $orm = Ormawa::all();
        return view('Barang.barangOrmawaLain', compact(
            'brg',
            'orm',
            'idormawa'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kat = Kategori::all();
        $orm = Ormawa::all();
        $model = new Barang;
        return view('Barang.create', compact(
            'model',
            'kat',
            'orm'
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
        $validateData = $request->validate([
            'foto'=>'image|file|max:1024',
            
          ]);
        $nm = $request->foto;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

        $model = new Barang;
        $model->nm_barang = $request->nm_barang;
        $model->kategori_id = $request->kategori_id;
        $model->ormawa_id = $request->ormawa_id;
        $model->qty = $request->qty;
        $model->foto = $nmFile;
        $model->status =$request->status;

        $nm->move(public_path() . '/img', $nmFile);

        $model->save();

        return redirect('barang')
        ->with('success','Data Barang Berhasil Ditambah');
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
        $kat = Kategori::all();
        $orm = Ormawa::all();
        $model = Barang::with('kategori', 'ormawa')->find($id);
        return view('Barang.update', compact(
            'model',
            'kat',
            'orm'
        ));
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
        $model = Barang::find($id);
        $model->nm_barang = $request->nm_barang;
        $model->kategori_id = $request->kategori_id;
        $model->ormawa_id = $request->ormawa_id;
        $model->qty = $request->qty;
        $model->foto = $request->oldImage;
        $model->status= $request->status;

        $nm = $request->foto;
        if (file_exists($nm)) {
            $nm->move(public_path().'/img', $request->oldImage);
         }

        $model->update();
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $model = Barang::find($id);
        $file = public_path('/img/') . $model->foto;

        if (file_exists($file)) {
            @unlink($file);
        }
        $model->delete();
        return redirect('barang');
    }

    public function detail()
    {
        $data_barang = Barang::with('ormawa')->orderBy('nm_barang','ASC')->get();
        return view('Barang.detailbarang', compact(
            'data_barang'
        ));
    }
}
