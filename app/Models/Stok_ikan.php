<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok_ikan extends Model
{
    use HasFactory;

    protected $table = 'stok_ikan';

    protected $primaryKey = 'id_stok';

    protected $fillable = ['id_user', 'kode_ikan', 'stok', 'stok_awal', 'tanggal'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function kelola_ikan()
    {
        return $this->hasOne('App\Models\Kelola_ikan', 'kode_ikan', 'kode_ikan');
    }
}
