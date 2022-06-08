<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="kategori";

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
