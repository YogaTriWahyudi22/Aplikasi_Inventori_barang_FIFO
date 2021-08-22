<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_ikan extends Model
{
    use HasFactory;

    protected $table = 'stok_ikan';

    protected $primaryKey = 'id_stok';
}
