<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ormawa;
use Illuminate\Support\Facades\Hash;

class profil extends Controller
{
    public function index($id)
    {
        $model = User::with('ormawa')->find($id);
        return view('profil.index', compact(
            'model'
        ));
    }
    public function update(Request $request, $id)
    {
        {
            $model = Ormawa::find($id);
            $model->nm_ormawa = $request->nm_ormawa;
            $model->no_telp = $request->no_telp;
            $model->save();
    
            return redirect('/')->with('success','Data Berhasil Di Update !');
        }
    }
    public function password(Request $request, $id)
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
            $model->save();
            return redirect('/')->with('success','Ubah Password Akun Berhasil !');
    }
}
