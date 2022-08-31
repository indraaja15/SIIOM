<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_barang_peminjaman extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="detail_barang_peminjaman";
    protected $primaryKey = 'peminjaman_id';
}
