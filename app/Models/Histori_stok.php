<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori_stok extends Model
{
    use HasFactory;

    protected $table = 'histori_stok';

    protected $primaryKey = 'id_histori_stok';

    protected $fillable = ['id_user', 'kode_ikan', 'stok_awal', 'stok', 'tanggal', 'keterangan'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function kelola_ikan()
    {
        return $this->hasOne('App\Models\Kelola_ikan', 'kode_ikan', 'kode_ikan');
    }
}
