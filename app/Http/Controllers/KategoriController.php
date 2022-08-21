<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kategori::orderBy('nm_kategori','asc')->get();
        return view('Kategori.index', compact(
            'datas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new kategori;
        return view('kategori.create', compact(
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
        

        // return redirect('kategori')
        // ->with('success','Kategori Berhasil Ditambah');

        $validateData = $request->validate([
            'nm_kategori'=>'required|unique:kategori',
            
          ]);
          $model = new Kategori;
          $model->nm_kategori = $request->nm_kategori;
        
          if ($model->save()) {
            return redirect('/kategori')->with('success','Kategori Berhasil Ditambah !');
            
          }else{
          
          return back;
          }
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
        $model = Kategori::find($id);
        return view('Kategori.update', compact(
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
            $model = Kategori::find($id);
            $model->nm_kategori = $request->nm_kategori;
            $model->save();
    
            return redirect('kategori');
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
        $model= Kategori::find($id);
        $model->delete();
        return redirect('kategori');
    }

}
