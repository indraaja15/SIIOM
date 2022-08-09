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
    public function detailPeminjaman()
    {
        return $this->hasmany(detailPeminjaman::class);
    }
    public function peminjaman()
    {
        return $this->beLongsToMany(peminjaman::class);
    }

}
