<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_peminjaman extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="barang_peminjaman";
    // protected $primaryKey = 'peminjaman_id';
    public function detail_barang()
    {
        return $this->beLongsToMany(detail_barang::class);
    }
}
