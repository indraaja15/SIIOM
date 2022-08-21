<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ormawa;
use App\Models\peminjaman;
use App\Models\barang_peminjaman;
use App\Models\User;

class berandaController extends Controller
{
    public function index()
    {
        $corma = Ormawa::count();
        $barang = Barang::count();
        $userc = User::count();
        $kategori = Kategori::count();
        $user = User::all();
        $orm = ormawa::all();
        $peminjaman = peminjaman::with('user')->get();
        $brg = Barang::all();
        $dp = barang_peminjaman::all();
        return view('index', compact(
            'userc',
            'brg',
            'peminjaman',
            'dp',
            'corma',
            'barang',
            'orm',
            'user',
            'kategori'
        ));
    }
}
