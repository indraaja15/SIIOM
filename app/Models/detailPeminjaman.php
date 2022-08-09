<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPeminjaman extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function Barang()
    {
        return $this->beLongsTo(Barang::class);
    }
    public function peminjaman()
    {
        return $this->beLongsTo(peminjaman::class);
    }
}
