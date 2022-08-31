<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_barang extends Model
{
    use HasFactory;
    protected $guarded =['kode_brg'];
    protected $table ="detail_barang";
    protected $primaryKey = 'kode_brg';

    public function Barang()
    {
        return $this->beLongsTo(Barang::class);
    }
    public function barang_peminjaman()
    {
        return $this->beLongsToMany(barang_peminjaman::class);
    }
}
