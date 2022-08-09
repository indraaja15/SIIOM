<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_peminjaman extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="barang_peminjaman";
}
