<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="ormawa";
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

}
