<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Ormawa::orderBy('nm_ormawa','ASC')->get();
        return view('Ormawa.index', compact(
            'datas'
        ));
    }
    public function lihat($id)
    {
        $idormawa = $id;
        $brg = Barang::with('ormawa')->paginate(5);
        $orm = Ormawa::all();
        return view('Ormawa.ormawaDetail', compact(
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
        $model = new ormawa;
        return view('Ormawa.create', compact(
            'model'
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
        $model = new Ormawa;
        $model->nm_ormawa = $request->nm_ormawa;
        $model->save();

        return redirect('ormawa');
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
        $model = Ormawa::find($id);
        return view('Ormawa.update', compact(
            'model'
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
        {
            $model = Ormawa::find($id);
            $model->nm_ormawa = $request->nm_ormawa;
            $model->save();
    
            return redirect('ormawa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $model = Ormawa::find($id);
       $model ->delete();
       return redirect('ormawa');
    }
    public function detail()
    {
        $datas = Ormawa::orderBy('nm_ormawa','asc')->get();
        return view('Ormawa.ormawaDetail', compact(
            'datas'
        ));
    }
}
