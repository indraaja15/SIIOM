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
        $orm = Ormawa::all();
        return view('daftar.index',compact(
            'orm'
        ));
    }
    
    public function store(Request $request)
    {
      $validatePW = $request->validate([
        'ulangi-password'=>'required|same:password'
      ]);
      $validateData = $request->validate([
        'ormawa_id'=>'required',
        'username' =>'required|unique:users',
        'password' =>'required|min:5',
        'hak_akses'=>'required',
        
      ]);
      $validateData['password'] = Hash::make($validateData['password']);

      
      
      if (User::create($validateData)) {
        return redirect('/login')->with('success','Daftar Akun Berhasil !');
        
      }else{
      
      return back;
      }
    }
}
