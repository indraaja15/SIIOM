<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userOrmawa extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="User_Ormawa";
}
