<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function User()
    {
        return $this->beLongsTo(User::class);
    }
    public function detailPeminjaman()
    {
        return $this->hasmany(detailPeminjaman::class);
    }
    public function Barang()
    {
        return $this->beLongsToMany(Barang::class);
    }

}
