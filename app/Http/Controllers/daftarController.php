<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ormawa;
use Illuminate\Support\Facades\Hash;

class daftarController extends Controller
{
    public function index()
    {
      $user = User::with('ormawa')->get();
        $orm = Ormawa::with('user')->get();
        return view('daftar.index',compact(
            'orm',
            'user'
        ));
    }
    public function kelola()
    {
      $title = User::with('ormawa')->find(auth()->user()->id);
      $user = User::with('ormawa')->get();
        $orm = Ormawa::with('user')->get();
        return view('daftar.kelola',compact(
            'orm',
            'title',
            'user'
        ));
    }
    
    public function store(Request $request)
    {
      $validatePW = $request->validate([
        'ulangi-password'=>'required|same:password'
      ]);
      $validateData = $request->validate([
        'ormawa_id'=>'required|unique:users,ormawa_id',
        'username' =>'required|unique:users',
        'password' =>'required|min:5',
        'hak_akses'=>'required',
        
      ]);
      $validateData['password'] = Hash::make($validateData['password']);

      
      
      if (User::create($validateData)) {
        return redirect('/daftar')->with('success','Daftar Akun Berhasil !');
        
      }else{
      
      return back;
      }
    }
    public function simpankelola(Request $request)
    {
      $validatePW = $request->validate([
        'ulangi-password'=>'required|same:password'
      ]);
      $validateData = $request->validate([
        'ormawa_id'=>'required|unique:users,username',
        'username' =>'required|unique:users',
        'password' =>'required|min:5',
        'hak_akses'=>'required',
        
      ]);
      $validateData['password'] = Hash::make($validateData['password']);

      
      
      if (User::create($validateData)) {
        return redirect('/kelola')->with('success','Daftar Akun Berhasil !!');
        
      }else{
      
      return back;
      }
    }
    public function update(Request $request, $id)
    {
      $validatePW = $request->validate([
        'ulangi-password'=>'required|same:password'
      ]);
      $validateData = $request->validate([
        'password' =>'required|min:5',
        'hak_akses'=>'required',
        
      ]);
            $model = User::find($id);
            $model->username = $request->username;
            $model->ormawa_id = $request->ormawa_id;
            $model->hak_akses = $request->hak_akses;
            $model->password =  Hash::make($request->password);
            if ($model->save()) {
            return redirect('/daftar')->with('success','Ubah Password Akun Berhasil !');
            }else{
            
            return back;
            }  
    }
    public function updatekelola(Request $request, $id)
    {
      $validateData = $request->validate([
        'ulangi-password'=>'required|same:password',
        'password' =>'required|min:5',
        'hak_akses'=>'required',
        
      ]);
            $model = User::find($id);
            $model->username = $request->username;
            $model->ormawa_id = $request->ormawa_id;
            $model->hak_akses = $request->hak_akses;
            $model->password =  Hash::make($request->password);
            $model->update();
            return redirect('/kelola')->with('success','Ubah Password Akun Berhasil !');
    }

    public function edit($id)
    {
        $model = User::with('ormawa')->find($id);
        return view('daftar.update', compact(
            'model'
        ));
    }
    public function editkelola($id)
    {
        $model = User::with('ormawa')->find($id);
        return view('daftar.updatekelola', compact(
            'model'
        ));
    }
    public function nonaktif($id)
    {
        $model= User::find($id);
        $model->hak_akses = "nonaktif";
        $model->update();
        return redirect('/kelola')->with('success',' Akun Berhasil Dinonaktifkan !');
    }
    public function aktif($id)
    {
        $model= User::find($id);
        $model->hak_akses = "opr";
        $model->update();
        return redirect('/kelola')->with('success',' Akun Berhasil Di Aktifkan !');
    }
    public function destroy($id)
    {
        $model= User::find($id);
        $model->delete();
        return redirect('daftar')->with('success','Hapus Akun Berhasil !');
    }
}
