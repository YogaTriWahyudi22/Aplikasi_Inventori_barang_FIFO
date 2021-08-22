<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelola_ikan extends Model
{
    use HasFactory;

    protected $table = 'kelola_ikan';

    protected $primarykey = 'id_kelola_ikan';

    protected $fillable = ['id_user', 'kode_ikan', 'nama_ikan', 'harga_beli', 'harga_jual', 'tanggal_input', 'tanggal_expired'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
