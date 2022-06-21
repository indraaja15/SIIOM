<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ormawa;
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
        $kat = Kategori::all();
        $orm = Ormawa::all();
        $data_barang = Barang::with('Kategori', 'Ormawa')->paginate(5);
        return view('barang.index', compact(
            'data_barang',
            'kat',
            'orm'
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
        return view('barang.create', compact(
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
        $nm = $request->foto;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

        $model = new Barang;
        $model->nm_barang = $request->nm_barang;
        $model->kategori_id = $request->kategori_id;
        $model->ormawa_id = $request->ormawa_id;
        $model->qty = $request->qty;
        $model->foto = $nmFile;

        $nm->move(public_path() . '/img', $nmFile);

        $model->save();

        return redirect('barang');
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
        return view('barang.update', compact(
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
        $file = public_path('/img/') . $request->oldImage;

        if (file_exists($file)) {
            @unlink($file);
        }
        $nm = $request->foto;
        $nmFile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();

        $model = Barang::find($id);
        $model->nm_barang = $request->nm_barang;
        $model->kategori_id = $request->kategori_id;
        $model->ormawa_id = $request->ormawa_id;
        $model->qty = $request->qty;
        $model->foto = $nmFile;

        $nm->move(public_path() . '/img', $nmFile);

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
}
