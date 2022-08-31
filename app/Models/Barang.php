<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    
    protected $guarded =['id'];
    protected $table ="barang";

    public function Kategori()
    {
        return $this->beLongsTo(Kategori::class);
    }
    public function Ormawa()
    {
        return $this->beLongsTo(Ormawa::class);
    }
    public function barang_peminjaman()
    {
        return $this->hasmany(barang_peminjaman::class);
    }
    public function detail_barang()
    {
        return $this->hasMany(detail_barang::class);
    }
    public function peminjaman()
    {
        return $this->beLongsToMany(peminjaman::class);
    }

}
